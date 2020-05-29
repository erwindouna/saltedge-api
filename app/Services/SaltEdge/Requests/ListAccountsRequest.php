<?php

namespace App\Services\SaltEdge\Requests;

use App\Repositories\SaltEdge\CustomerRepository;
use App\Services\SaltEdge\Objects\Account;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ListAccountsRequest extends SaltEdgeRequest
{
    protected $uri;

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

        foreach ($customers as $k => $c) {
            $login = unserialize($c->object);

            $tmpUri = $this->uri . '?' . http_build_query(['login_id' => $login->getId()]);
            $response = $this->getRequest($tmpUri);

            if (null === $response) {
                Log::error(sprintf('Could not find accounts for customerId %s.', $c->customer_id));
                continue;
            }

            $collection = new Collection;
            foreach ($response['body']['data'] as $transactionArray) {
                $collection->push(new Account($transactionArray));
            }

            foreach ($collection as $k => $c) {

            }

            dd($collection);

        }
    }
}