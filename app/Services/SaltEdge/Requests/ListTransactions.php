<?php

namespace App\Services\SaltEdge\Requests;

use App\Repositories\SaltEdge\AccountRepository;
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
        $accounts = new AccountRepository;
        $accounts = $accounts->findAllAccounts();

        if (null === $accounts) {
            Log::error('No active accounts were currently found.');
            return;
        }

        Log::info(sprintf('A total of %s accounts record(s) were fetch from the DB. Looping through record(s) and fetch transactions from SaltEdge.', $accounts->count()));
        foreach ($accounts as $a) {
            $account = unserialize($a->object);

            $tmpUri = $this->uri . '?' . http_build_query(['account_id' => $account->getId()]);
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
                $account = new AccountRepository;
                $account = $account->findByAccountId($col->getId());
                if (null === $account) {
                    Log::info(sprintf('Creating new account record for %s.', $col->getName()));
                    $account = new AccountRepository;
                    $account->store($col, $c->id);
                    continue;
                }

                Log::info(sprintf('Updating account record for %s.', $col->getName()));
                $account->object = serialize($col);
                $account->hash = hash('sha256', serialize($col));
                $account->save();
            }

            $this->accounts = $collection->toArray();

        }
    }
}