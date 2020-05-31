<?php

namespace App\Services\Fireflly\Requests;

use App\Repositories\Firefly\AccountRepository;
use App\Services\Firefly\Requests\FireflyRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class Transactions extends FireflyRequest
{
    public function __construct()
    {
        parent::__construct();

        $this->uri = 'transactions';
    }

    public function call(): void
    {
        Log::info('Starting to retrieve all tranactions from Firefly.');

        $response = $this->getRequest($this->uri);

        if (null === $response) {
            Log::error('Could not find any transactions for Firefly.');
            return;
        }

        $collection = new Collection;
        if (0 <= count($response['body']['data'])) {
            Log::error('No transactions were found via the Firefly API');
            return;
        }

        foreach ($response['body']['data'] as $accountArray) {
            $collection->push(new Tran($accountArray));
        }

        Log::info(sprintf('A total of %s account record(s) were retrieved. Looping through record(s).', $collection->count()));
        foreach ($collection as $k => $c) {
            $account = new AccountRepository;
            $account = $account->findByAccountId($c->getId());
            if (null === $account) {
                Log::info(sprintf('Creating new account record for %s.', $c->getAttributes()->getName()));
                $account = new AccountRepository;
                $account->store($c);
                continue;
            }

            Log::info(sprintf('Updating account record for %s.', $c->getAttributes()->getName()));
            $account->object = encrypt(serialize($c));
            $account->hash = hash('sha256', encrypt(serialize($c)));
            $account->save();
        }

        $this->accounts = $collection->toArray();
    }
}