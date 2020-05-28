<?php

namespace App\Repositories\SaltEdge;

use App\Models\Customer;

interface CustomerInterface
{
    /**
     * @param int $customerId
     * @return Customer|null
     */
    public function findByCustomerId(int $customerId): ?Customer;
}