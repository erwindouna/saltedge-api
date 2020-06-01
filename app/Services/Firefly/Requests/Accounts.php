<?php

namespace App\Services\Firefly\Requests;

use App\Repositories\Firefly\AccountRepository;
use App\Services\Firefly\Objects\Account;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class Accounts extends FireflyRequest
{
    protected $uri;
    private $accounts;

    public function __construct()
    {
        parent::__construct();

        $this->uri = 'accounts';
    }

    public function call(): void
    {
        Log::info('Starting to retrieve all accounts from Firefly.');
        // Perform a flush first
        $this->flush();

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
        foreach ($collection as $k => $c) {
            $account = new AccountRepository;
            $account = $account->findByAccountId($c->getId());
            if (null === $account) {
                Log::info(sprintf('Creating new account record for %s.', $c->getAttributes()->getName()));
                $account = new AccountRepository;
                $account->store($c);
                continue;
            }

            Log::info(sprintf('Updating account record for %s.', $c->getAttributes()->getName()));
            $account->object = encrypt(serialize($c));
            $account->hash = hash('sha256', encrypt(serialize($c)));
            $account->save();
        }

        $this->accounts = $collection->toArray();
    }

    /**
     * @return Account|null
     */
    public function getAccounts(): ?Account
    {
        return $this->accounts;
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        Log::info('Performing Firefly transaction(s) flush.');
        $accountsFlush = new AccountRepository;
        $accountsFlush->flush();
        Log::info('Finished Firefly transaction(s) flush.');
    }
}