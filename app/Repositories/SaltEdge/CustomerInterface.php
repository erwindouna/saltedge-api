<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Customer;

interface CustomerInterface
{
    /**
     * @param int $customerId
     * @return Customer|null
     */
    public function findByCustomerId(int $customerId): ?Customer;

    public function store(object $data): ?Customer;
}