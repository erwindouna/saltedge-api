<?php

namespace App\Repositories\Firefly;

use App\Models\Firefly\Account;
use Illuminate\Support\Collection;

class AccountRepository implements AccountInterface
{

    /**
     * @param object $data
     * @return Account|null
     */
    public function store(object $data): ?Account
    {
        $object = encrypt(serialize($data));
        $model = Account::create([
            'account_id' => $data->getId(),
            'account_name' => $data->getAttributes()->getName(),
            'account_iban' => $data->getAttributes()->getIban(),
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
     * @param string $iban
     * @return Account|null
     */
    public function findByIban(string $iban): ?Account
    {
        $iban = strtoupper(str_replace(' ', '', $iban));
        return Account::where('account_iban', $iban)->first();
    }

    /**
     * @return Collection|null
     */
    public function findAllAccounts(): ?Collection
    {
        return Account::whereNull('deleted_at')->get();
    }
}