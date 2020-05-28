<?php

namespace App\Repositories\SaltEdge;

use App\Models\Customer;
use App\Repositories\SaltEdgeCustomersInterface\SaltEdgeCustomersInterface;

class CustomerRepository implements CustomerInterface
{
    /**
     * @param int $customerId
     * @return Customer|null
     */
    public function findByCustomerId(int $customerId): ?Customer
    {
        return Customer::where('customer_id', $customerId)->firstOrFail();
    }
}