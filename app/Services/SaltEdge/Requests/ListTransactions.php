<?php

namespace App\Services\SaltEdge\Requests;

use App\Repositories\SaltEdge\AccountRepository;
use App\Repositories\SaltEdge\TransactionRepository;
use App\Services\SaltEdge\Objects\Transaction;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ListTransactions extends SaltEdgeRequest
{
    protected $uri;
    private $transactions;

    /**
     * ListTransactions constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->uri = 'transactions';
    }

    public function call(): void
    {
        Log::info('Starting to retrieve all transactions, linked by the available accounts. Fetching accounts object(s).');
        $this->flush();

        $accounts = new AccountRepository;
        $accounts = $accounts->findAllAccounts();

        if (null === $accounts) {
            Log::error('No active accounts were currently found.');
            return;
        }

        Log::info(sprintf('A total of %s accounts record(s) were fetch from the DB. Looping through record(s) and fetch transactions from SaltEdge.', $accounts->count()));
        foreach ($accounts as $a) {
            $account = unserialize(decrypt($a->object));

            $nextPage = 0;
            $continueRequest = true;
            while ($continueRequest) {
                $tmpUri = $this->uri . '?' . http_build_query(['from_id' => $nextPage, 'account_id' => $account->getId()]);
                $response = $this->getRequest($tmpUri);

                if (null === $response) {
                    Log::error(sprintf('Could not find transactions for accountId %s.', $account->getId()));
                    continue;
                }

                $collection = new Collection;
                foreach ($response['body']['data'] as $transactionArray) {
                    $collection->push(new Transaction($transactionArray));
                }

                Log::info(sprintf('A total of %s transactions record(s) were retrieved. Looping through record(s).', $collection->count()));
                foreach ($collection as $k => $c) {
                    $transaction = new TransactionRepository;
                    $transaction = $transaction->findByTransactionId($c->getId());
                    if (null === $transaction) {
                        Log::info(sprintf('Creating new transaction record for %s.', $c->getId()));
                        $transaction = new TransactionRepository;
                        $transaction->store($c, $c->getAccountId());
                        continue;
                    }

                    Log::info(sprintf('Updating transaction record for %s.', $c->getId()));
                    $transaction->object = encrypt(serialize($c));
                    $transaction->hash = hash('sha256', encrypt(serialize($c)));
                    $transaction->save();
                }
                $this->transactions[] = $collection->toArray();

                $continueRequest = false;
                if (isset($response['body']['meta']['next_id']) && (int)$response['body']['meta']['next_id'] > $nextPage) {
                    $continueRequest = true;
                    $nextPage = $response['body']['meta']['next_id'];
                }
            }


        }
    }

    /**
     * @return Transaction|null
     */
    public function getTransactions(): ?Transaction
    {
        return $this->transactions;
    }

    public function flush(): void
    {
        Log::info('Performing SaltEdge transaction(s) flush.');
        $transactionsFlush = new TransactionRepository;
        $transactionsFlush->flush();
        Log::info('Finished SaltEdge transaction(s) flush.');

    }
}