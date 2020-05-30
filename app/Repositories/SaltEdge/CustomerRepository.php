<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Customer;
use Illuminate\Support\Collection;

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
     * @return Customer|null
     */
    public function findAllCustomers(): ?Collection
    {
        return Customer::whereNull('deleted_at')->get();
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
        $object = encrypt(serialize($data));
        $model = Customer::create([
            'customer_id' => $data->getCustomerId(),
            'provider' => $data->getProviderName(),
            'object' => $object,
            'hash' => hash('sha256', $object)
        ]);

        return $model;
    }
}