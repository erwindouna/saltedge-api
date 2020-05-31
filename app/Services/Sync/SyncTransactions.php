<?php

namespace App\Services\Sync;

use App\Repositories\Firefly\TransactionRepository as FFRepo;
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
        Log::info('Fetching both Firefly and SaltEdge transactionss.');
        $saltEdgeTransactions = new SARepo;
        $saltEdgeTransactions = $saltEdgeTransactions->findAllTransactions();

        // Alright, now the mappings needs to happen
        // The basic idea is that the IBAN is unique and should be searched for
        foreach ($saltEdgeTransactions as $s) {
            $object = unserialize(decrypt($s->object));
            // Try to find a matching Firefly accounts
            $fireflyTransaction = new FFRepo;

            $fireflyTransaction = $fireflyTransaction->findByExternalId($s->salt_edge_transaction_id);

            if (null === $fireflyTransaction) {
                Log::info(sprintf('Firefly transaction with details %s was not found by Iban. Continue search on account number.', $s->salt_edge_transaction_id));
                $newTransaction = $this->createTransaction($object);
                if (null === $newTransaction) {
                    Log::error(sprintf('Unable to create transaction for %s. Skipping record and continuing...', $s->salt_edge_transaction_id));
                }
            }
            Log::info(sprintf('Transaction with details %s already exists. Skipping...', $s->salt_edge_transaction_id));
        }
    }

    /**
     * @param Transaction $saltEdgeTransaction
     * @return bool
     */
    private function createTransaction(Transaction $saltEdgeTransaction): bool
    {
        // @TODO: nasty, make objects later on
        $data = [];

        $transaction['description'] = $saltEdgeTransaction->getDescription();
        $transaction['date'] = $saltEdgeTransaction->getMadeOn()->format('Y-m-d');

        $transaction['type'] = 'withdrawal';
        if (1 === bccomp($saltEdgeTransaction->getAmount(), '0')) {
            $transaction['type'] = 'deposit';
        }

        $transaction['amount'] = abs($saltEdgeTransaction->getAmount());
        // @TODO: now a big part comes: build the mechanic that searches for the accounts per transaction, else create one via the Firefly API and use that one

        $data['transactions'][] = $transaction;


        $postRequest = new Transactions();
        $postRequest->postRequest($this->uri, $data);
        //exit;

        return true;
    }
}