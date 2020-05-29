<?php

namespace App\Services\Firefly\Requests;

use App\Repositories\SaltEdge\AccountRepository;
use App\Services\SaltEdge\Objects\Account;
use App\Services\SaltEdge\Objects\Transaction;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class Accounts extends FireflyRequest
{
    protected string $uri;
    private $accounts;

    /**
     * ListTransactions constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->uri = 'accounts';
    }

    public function call(): void
    {
        Log::info('Starting to retrieve all accounts from Firefly.');

        $response = $this->getRequest($this->uri);

        if (null === $response) {
            Log::error('Could not find any active accounts for Firefly.');
            return;
        }

        $collection = new Collection;
        foreach ($response['body']['data'] as $accountArray) {
            $collection->push(new Account($accountArray));
        }

        Log::info(sprintf('A total of %s account record(s) were retrieved. Looping through record(s).', $collection->count()));
        foreach ($collection as $k => $col) {
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

    /**
     * @return Transaction|null
     */
    public function getAccounts(): ?Acc
    {
        return $this->accounts;
    }
}