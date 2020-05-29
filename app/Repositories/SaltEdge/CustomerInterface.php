<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Customer;
use Illuminate\Support\Collection;

interface CustomerInterface
{
    /**
     * @param int $customerId
     * @return Customer|null
     */
    public function findByCustomerId(int $customerId): ?Customer;

    /**
     * @param object $data
     * @return Customer|null
     */
    public function store(object $data): ?Customer;

    /**
     * @return Customer|null
     */
    public function findAllCustomers(): ?Collection;
}