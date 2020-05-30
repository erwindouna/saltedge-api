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
        $object = encrypt(serialize($data));
        $model = Account::create([
            'account_id' => $data->getId(),
            'account_name' => $data->getName(),
            'salt_edge_customer_id' => $customerId,
            'object' => $object,
            'hash' => hash('sha256', $object)
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
     * @return Collection|null
     */
    public function findAllAccounts(): ?Collection
    {
        return Account::whereNull('deleted_at')->get();
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