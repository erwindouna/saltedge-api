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
            'account_number' => $data->getAttributes()->getAccountNumber(),
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
        return Account::where('account_iban', $iban)->first();
    }

    /**
     * @param string $accountNumber
     * @return Account|null
     */
    public function findByAccountNumber(string $accountNumber): ?Account
    {
        return Account::where('account_number', $accountNumber)->first();
    }

    /**
     * @param string $accountName
     * @return Account|null
     */
    public function findByAccountName(string $accountName): ?Account
    {
        return Account::where('account_name', $accountName)->first();
    }

    /**
     * @return Collection|null
     */
    public function findAllAccounts(): ?Collection
    {
        return Account::whereNull('deleted_at')->get();
    }

    /**
     * Flush all known instances
     */
    public function flush(): void
    {
        Account::truncate();
    }
}