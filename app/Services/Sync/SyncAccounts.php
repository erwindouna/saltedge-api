<?php

namespace App\Services\Sync;

use Illuminate\Support\Facades\Log;

class SyncAccounts extends SyncHandler
{

    /**
     * SyncAccounts constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function call(): void
    {
        Log::info('Fetching both Firefly and SaltEdge accounts.');
        $saltEdgeAccounts = new \App\Repositories\SaltEdge\AccountRepository;
        $saltEdgeAccounts = $saltEdgeAccounts->findAllAccounts();

        $fireflyAccounts = new \App\Repositories\Firefly\AccountRepository;
        $fireflyAccounts = $fireflyAccounts->findAllAccounts();

        // Alright, now the mappings needs to happen
        // The basic idea is that the IBAN is unique and should be searched for
        foreach ($saltEdgeAccounts as $s) {
            // Try to find a matching Firefly accounts
            $fireflyAccount = new \App\Repositories\Firefly\AccountRepository;
            $fireflyAccount = $fireflyAccount->findByIban($s->account_name);

            if (null === $fireflyAccount) {
                Log::info(sprintf('Firefly account with details %s was not found yet. Trying to create...', $s->account_name));
            }
        }
    }
}