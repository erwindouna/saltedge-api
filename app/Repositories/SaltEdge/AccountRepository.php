<?php

namespace App\Repositories\SaltEdge;

use App\Models\SaltEdge\Account;
use Illuminate\Support\Collection;

class AccountRepository implements AccountInterface
{

    /**
     * @param object $data
     * @param int $customerId
     * @return Account|null
     */
    public function store(object $data, int $customerId): ?Account
    {
        $model = Account::create([
            'account_id' => $data->getId(),
            'account_name' => $data->getName(),
            'salt_edge_customer_id' => $customerId,
            'object' => serialize($data),
            'hash' => hash('sha256', serialize($data))
        ]);

        return $model;
    }

    /**
     * @param int $accountId
     * @return Account|null
     */
    public function findByAccountId(int $accountId): ?Account
    {
        return Account::where('account_id', $accountId)->first();
    }

    /**
     * @param int $customerId
     * @return Collection|null
     */
    public function findByCustomerId(int $customerId): ?Collection
    {
        return Account::where('salt_edge_customer_id', $customerId)->get();
    }
}