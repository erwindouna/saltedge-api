<?php

namespace App\Services\Firefly\Objects\Account;

use App\Services\SaltEdge\Objects\Account;

class CreateAccount
{

    public function __construct(array $array)
    {
        /**
         * "name": "My checking account",
         * "type": "asset",
         * "iban": "GB98MIDL07009312345678",
         * "bic": "BOFAUS3N",
         * "account_number": "7009312345678",
         * "opening_balance": -1012.12,
         * "opening_balance_date": "2018-09-17",
         * "virtual_balance": 1000,
         * "currency_id": 12,
         * "currency_code": "EUR",
         * "active": true,
         * "include_net_worth": true,
         * "account_role": "defaultAsset",
         * "credit_card_type": "monthlyFull",
         * "monthly_payment_date": "2018-09-17",
         * "liability_type": "loan",
         * "liability_amount": 12000,
         * "liability_start_date": "2017-09-17",
         * "interest": "5.3",
         * "interest_period": "monthly",
         * "notes": "Some example notes"
         */
        //$this->name =
    }

    /**
     * @param array $array
     * @param Account $account
     * @return array|null
     */
    public function getCreateAccountSaltEdge(array $array, Account $account): ?array
    {

    }
}