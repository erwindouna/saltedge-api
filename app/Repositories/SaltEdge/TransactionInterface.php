<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Transaction;
use Illuminate\Support\Collection;

interface TransactionInterface
{
    /**
     * @param object $data
     * @param int $accountId
     * @return Transaction|null
     */
    public function store(object $data, int $accountId): ?Transaction;

    /**
     * @param int $accountId
     * @return Collection|null
     */
    public function findByAccountId(int $accountId): ?Collection;

    /**
     * @param int $id
     * @return Transaction|null
     */
    public function findByTransactionId(int $id): ?Transaction;

    /**
     * @return Transaction|null
     */
    public function findAllTransactions(): ?Collection;

    public function flush(): void;
}