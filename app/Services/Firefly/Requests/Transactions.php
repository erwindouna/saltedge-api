<?php

namespace App\Services\Fireflly\Requests;

use App\Repositories\Firefly\TransactionRepository;
use App\Services\Firefly\Objects\Transaction;
use App\Services\Firefly\Requests\FireflyRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class Transactions extends FireflyRequest
{
    protected $uri;
    protected $transactios;

    public function __construct()
    {
        parent::__construct();

        $this->uri = 'transactions';
    }

    public function call(): void
    {
        Log::info('Starting to retrieve all transactions from Firefly.');
        // Flush first
        $this->flush();

        $nextPage = 1;
        $continueRequest = true;
        while ($continueRequest) {
            $tmpUri = $this->uri . '?' . http_build_query(['page' => $nextPage]);
            $response = $this->getRequest($tmpUri);

            if (null === $response) {
                Log::error('Could not find any transactions for Firefly.');
                return;
            }

            $collection = new Collection;
            if (count($response['body']['data']) === 0) {
                Log::error('No transactions were found via the Firefly API');
                return;
            }

            foreach ($response['body']['data'] as $accountArray) {
                $collection->push(new Transaction($accountArray));
            }

            Log::info(sprintf('A total of %s transactions record(s) were retrieved. Looping through record(s).', $collection->count()));
            foreach ($collection as $k => $c) {
                $transaction = new TransactionRepository;
                $transaction = $transaction->findByTransActionId($c->getId());
                if (null === $transaction) {
                    Log::info(sprintf('Creating new transactions record for %s.', $c->getId()));
                    $transaction = new TransactionRepository;
                    $transaction->store($c);
                    continue;
                }

                Log::info(sprintf('Updating account record for %s.', $c->getId()));
                $transaction->object = encrypt(serialize($c));
                $transaction->hash = hash('sha256', encrypt(serialize($c)));
                $transaction->save();
            }

            $continueRequest = false;
            if (isset($response['body']['meta']['pagination']['current_page']) && $response['body']['meta']['pagination']['total_pages'] > $nextPage) {
                $continueRequest = true;
                $nextPage = ++$nextPage;
            }

            $this->transactios = $collection->toArray();
        }
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        Log::info('Performing Firefly transaction(s) flush.');
        $transactionsFlush = new TransactionRepository;
        $transactionsFlush->flush();
        Log::info('Finished Firefly transaction(s) flush.');
    }

    /**
     * @return Transactions|null
     */
    public function getTransactions(): ?Transactions
    {
        return $this->transactios;
    }
}