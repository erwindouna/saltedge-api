<?php

namespace App\Services\SaltEdge\Requests;

use App\Repositories\SaltEdge\AccountRepository;
use App\Repositories\SaltEdge\CustomerRepository;
use App\Services\SaltEdge\Objects\Account;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ListAccountsRequest extends SaltEdgeRequest
{
    protected $uri;
    private $accounts;

    /**
     * ListAccountsRequest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->uri = 'accounts';
    }

    public function call(): void
    {
        Log::info('Starting to retrieve all linked accounts. Fetching customer object(s).');
        $customers = new CustomerRepository;
        $customers = $customers->findAllCustomers();

        if (null === $customers) {
            Log::error('No active customers were found.');
            return;
        }

        Log::info(sprintf('A total of %s customer record(s) were fetch from the DB. Looping through record(s) and fetching accounts from SaltEdge.', $customers->count()));
        foreach ($customers as $k => $c) {
            $login = unserialize($c->object);

            $tmpUri = $this->uri . '?' . http_build_query(['login_id' => $login->getId()]);
            $response = $this->getRequest($tmpUri);

            if (null === $response) {
                Log::error(sprintf('Could not find accounts for customerId %s.', $c->customer_id));
                continue;
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
    }

    /**
     * @return Account|null
     */
    public function getAccounts(): ?Account
    {
        return $this->accounts;
    }
}