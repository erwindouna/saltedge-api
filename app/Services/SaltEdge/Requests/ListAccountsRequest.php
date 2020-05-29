<?php

namespace App\Services\SaltEdge\Requests;

use App\Repositories\SaltEdge\CustomerRepository;

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
        // First fetch the current registered customers
        $customers = new CustomerRepository;
        $customers = $customers->findAllCustomers();
        dd($customers);
    }
}