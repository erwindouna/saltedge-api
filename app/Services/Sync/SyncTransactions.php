<?php

namespace App\Services\Sync;

use App\Repositories\Firefly\AccountRepository as ffAccount;
use App\Repositories\Firefly\TransactionRepository as FFRepo;
use App\Repositories\SaltEdge\AccountRepository as saAccount;
use App\Repositories\SaltEdge\TransactionRepository as SARepo;
use App\Services\Fireflly\Requests\Transactions;
use App\Services\SaltEdge\Objects\Transaction;
use Illuminate\Support\Facades\Log;

class SyncTransactions extends SyncHandler
{
    protected $uri;

    public function __construct()
    {
        parent::__construct();

        $this->uri = 'transactions';
    }

    public function call(): void
    {
        Log::info('Fetching both Firefly and SaltEdge transactions.');
        $saltEdgeTransactions = new SARepo;
        $saltEdgeTransactions = $saltEdgeTransactions->findAllTransactions();

        // Alright, now the mappings needs to happen
        // The basic idea is that the IBAN is unique and should be searched for
        foreach ($saltEdgeTransactions as $s) {
            $object = unserialize(decrypt($s->object));
            // Try to find a matching Firefly accounts
            $fireflyTransaction = new FFRepo;
            $fireflyTransaction = $fireflyTransaction->findByExternalId($s->salt_edge_transaction_id);

            if (null !== $fireflyTransaction) {
                Log::info(sprintf('Transaction with details %s already exists. Skipping...', $s->salt_edge_transaction_id));
                continue;
            }

            $newTransaction = $this->createTransaction($object);
            if (null === $newTransaction) {
                Log::error(sprintf('Unable to create transaction for %s. Skipping record and continuing...', $s->salt_edge_transaction_id));
            }
        }
    }

    /**
     * @param Transaction $saltEdgeTransaction
     * @return bool
     * @throws \Exception
     */
    private function createTransaction(Transaction $saltEdgeTransaction): bool
    {
        // @TODO: nasty, make objects later on
        $data = [];

        $transaction['description'] = $saltEdgeTransaction->getDescription();
        $transaction['date'] = $saltEdgeTransaction->getMadeOn()->format('Y-m-d');

        $type = 'withdrawal';
        $swap = false;
        if (1 === bccomp($saltEdgeTransaction->getAmount(), '0')) {
            $swap = true;
            $type = 'deposit';
        }

        $transaction['amount'] = abs($saltEdgeTransaction->getAmount());
        // @TODO: now a big part comes: build the mechanic that searches for the accounts per transaction, else create one via the Firefly API and use that one

        // DEVELOP: assume for now the source_id is empty and we need to create an account
        $newAccount = new SyncAccounts();
        $newAccount = $newAccount->createAccountTransaction($saltEdgeTransaction);
        if (null === $newAccount) {
            Log::error(sprintf('Unable to create account for %s. Stopping creation of transaction.', $saltEdgeTransaction->getDescription()));
            return false;
        }

        $saltEdgeAccount = new saAccount;
        $saltEdgeAccount = $saltEdgeAccount->findByAccountId($saltEdgeTransaction->getAccountId());
        $fireflyAccount = new ffAccount;

        $fireflyAccount = $fireflyAccount->findByIban($saltEdgeAccount->getAttribute('account_name'));
        $ffObject = unserialize(decrypt($fireflyAccount->object));

        $source = ['id' => $ffObject->getId(), 'name' => $ffObject->getAttributes()->getName()];
        $destination = ['id' => $newAccount->getId(), 'name' => $newAccount->getAttributes()->getName()];

        if (true === $swap) {
            [$source, $destination] = [$destination, $source];
        }

        $transaction['type'] = $type;
        $transaction['destination_id'] = $destination['id'];
        $transaction['destination_name'] = $destination['name'];
        $transaction['source_id'] = $source['id'];
        $transaction['source_name'] = $source['name'];

        $transaction['external_id'] = $saltEdgeTransaction->getId();

        $data['transactions'][] = $transaction;

        $postRequest = new Transactions();
        $postRequest->postRequest($this->uri, $data);

        return true;
    }
}