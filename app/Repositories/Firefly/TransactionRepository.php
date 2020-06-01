<?php

namespace App\Repositories\Firefly;

use App\Models\Firefly\Transactions;

class TransactionRepository implements TransactionInterface
{
    /**
     * @param object $data
     * @return Transactions|null
     */
    public function store(object $data): ?Transactions
    {
        $object = encrypt(serialize($data));
        $model = Transactions::create([
            'description' => $data->getAttributes()->getTransactions()->getDescription(),
            'source_iban' => $data->getAttributes()->getTransactions()->getSourceIban(),
            'source_name' => $data->getAttributes()->getTransactions()->getSourceName(),
            'transaction_id' => $data->getId(),
            'external_id' => $data->getAttributes()->getTransactions()->getExternalId(),
            'object' => $object,
            'hash' => hash('sha256', $object)
        ]);

        return $model;
    }

    /**
     * @param int $transactionId
     * @return Transactions|null
     */
    public function findByTransActionId(int $transactionId): ?Transactions
    {
        return Transactions::where('transaction_id', $transactionId)->first();
    }

    /**
     * @param int $externalId
     * @return Transactions|null
     */
    public function findByExternalId(int $externalId): ?Transactions
    {
        return Transactions::where('external_id', $externalId)->first();
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        Transactions::truncate();
    }
}