<?php

namespace App\Repositories\Firefly;

use App\Models\Firefly\Account;
use Illuminate\Support\Collection;

interface AccountInterface
{
    /**
     * @param object $data
     * @return Account|null
     */
    public function store(object $data): ?Account;

    /**
     * @param int $accountId
     * @return Account|null
     */
    public function findByAccountId(int $accountId): ?Account;

    /**
     * @param string $iban
     * @return Account|null
     */
    public function findByIban(string $iban): ?Account;

    /**
     * @param string $accountNumber
     * @return Account|null
     */
    public function findByAccountNumber(string $accountNumber): ?Account;

    /**
     * @return Collection|null
     */
    public function findAllAccounts(): ?Collection;

    /**
     * @param string $accountName
     * @return Account|null
     */
    public function findByAccountName(string $accountName): ?Account;

    public function flush(): void;
}