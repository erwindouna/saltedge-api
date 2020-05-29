<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Account;
use Illuminate\Support\Collection;

interface AccountInterface
{
    /**
     * @param object $data
     * @param int $customerId
     * @return Account|null
     */
    public function store(object $data, int $customerId): ?Account;

    /**
     * @param int $accountId
     * @return Account|null
     */
    public function findByAccountId(int $accountId): ?Account;

    /**
     * @param int $customerId
     * @return Collection|null
     */
    public function findByCustomerId(int $customerId): ?Collection;
}