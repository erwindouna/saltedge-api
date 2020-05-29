<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Transaction;
use Ramsey\Collection\Collection;

class TransactionRepository implements TransactionInterface
{
    /**
     * @param object $data
     * @param int $accountId
     * @return Transaction|null
     */
    public function store(object $data, int $accountId): ?Transaction
    {
        $object = encrypt(serialize($data));
        $model = Transaction::create([
            'salt_edge_account_id' => $accountId,
            'salt_edge_transaction_id' => $data->getId(),
            'object' => $object,
            'hash' => hash('sha256', $object)
        ]);

        return $model;
    }

    /**
     * @param int $accountId
     * @return Collection|null
     */
    public function findByAccountId(int $accountId): ?Collection
    {
        // TODO: Implement findByAccountId() method.
    }

    /**
     * @param int $transactionId
     * @return Transaction|null
     */
    public function findByTransactionId(int $transactionId): ?Transaction
    {
        return Transaction::where('salt_edge_transaction_id', $transactionId)->first();
    }
}