<?php

namespace App\Repositories\Firefly;

use App\Models\Firefly\Transactions;

interface TransactionInterface
{
    /**
     * @param object $data
     * @return Transactions|null
     */
    public function store(object $data): ?Transactions;

    /**
     * @param int $transactionId
     * @return Transactions|null
     */
    public function findByTransActionId(int $transactionId): ?Transactions;

    /**
     * @param int $externalId
     * @return Transactions|null
     */
    public function findByExternalId(int $externalId): ?Transactions;
}