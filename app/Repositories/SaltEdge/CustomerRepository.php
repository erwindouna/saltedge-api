<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Customer;

class CustomerRepository implements CustomerInterface
{
    /**
     * @param int $customerId
     * @return Customer|null
     */
    public function findByCustomerId(int $customerId): ?Customer
    {
        return Customer::where('customer_id', $customerId)->first();
    }

    /**
     * @param int $customerId
     * @param string $hash
     * @return Customer|null
     */
    public function findByCustomerIdAndHash(int $customerId, string $hash): ?Customer
    {
        return Customer::where('customer_id', $customerId)->where('hash', $hash)->first();
    }

    /**
     * @param object $data
     * @return Customer|null
     */
    public function store(object $data): ?Customer
    {
        $model = Customer::create([
            'customer_id' => $data->getCustomerId(),
            'provider' => $data->getProviderName(),
            'object' => serialize($data),
            'hash' => hash('sha256', serialize($data))
        ]);

        return $model;
    }
}