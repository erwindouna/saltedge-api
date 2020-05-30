<?php

namespace App\Services\Sync;

use App\Repositories\Firefly\AccountRepository as FFRepo;
use App\Repositories\SaltEdge\AccountRepository as SARepo;
use App\Services\Firefly\Requests\Accounts;
use App\Services\SaltEdge\Objects\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SyncAccounts extends SyncHandler
{
    private $uri;

    /**
     * SyncAccounts constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->uri = 'accounts';
    }

    public function call(): void
    {
        Log::info('Fetching both Firefly and SaltEdge accounts.');
        $saltEdgeAccounts = new SARepo;
        $saltEdgeAccounts = $saltEdgeAccounts->findAllAccounts();

        $fireflyAccounts = new FFRepo;
        $fireflyAccounts = $fireflyAccounts->findAllAccounts();

        // Alright, now the mappings needs to happen
        // The basic idea is that the IBAN is unique and should be searched for
        foreach ($saltEdgeAccounts as $s) {
            $object = unserialize(decrypt($s->object));
            // Try to find a matching Firefly accounts
            $fireflyAccount = new FFRepo;

            // @TODO: should also be able to store the account_id in Firefly's meta table for future reference
            // Downside would be that the connection ID's change, the meta data would also render uselsess. The iban seems to be the safest solution as far as I see now.
            $fireflyAccount = $fireflyAccount->findByIban($s->account_name);

            if (null === $fireflyAccount) {
                Log::info(sprintf('Firefly account with details %s was not found yet. Trying to create...', $s->account_name));

                $newAccount = $this->createAccount($object);
                if (null === $newAccount) {
                    Log::error(sprintf('Unable to create account for %s. Skipping record and continuing...', $s->account_name));
                }
            }
        }
    }

    /**
     * @param Account $saltEdgeAccount
     * @return bool|null
     * @throws \Exception
     */
    public function createAccount(Account $saltEdgeAccount): ?bool
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

        $accountType = $this->determineFFAccountType($saltEdgeAccount->getNature());

        $data = [];
        $data['name'] = $saltEdgeAccount->getName();
        $data['type'] = $accountType;

        if ($accountType === 'liability') {
            $data['liability_type'] = 'mortgage'; // Fixed value, in my case. Bring on better logic handling later on.
            $data['liability_amount'] = abs($saltEdgeAccount->getBalance());
            $data['liability_start_date'] = new Carbon('2020-01-01');

            // Now here is a tricky part. If a person has multiple mortgages structure (quite common for instance in the Netherlands), SaltEdge will provide interest rates per mortgage
            // How to deal with that? I have not yet found a solution, whereas the total sum on mortgage is shown and there doesn't seem to be a division per mortgage.
            // Quickly and dirty for now: take the highest: it might feel beneficial if you 'save' some money if you pay less mortgage? ;)
            $data['interest'] = $saltEdgeAccount->getExtra()['floating_interest_rate']['max_value'];
            $data['interest_period'] = 'monthly'; // Fixed value
        } else {

            $data['iban'] = $saltEdgeAccount->getName();
        }

        $postRequest = new Accounts();
        $postRequest->postRequest($this->uri, $data);

        return true;
    }
}