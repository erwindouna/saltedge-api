<?php

namespace App\Console\Commands;

use App\Jobs\FireflyAccountsJob;
use App\Jobs\FireflyTransactionsJob;
use App\Jobs\SaltEdgeListAccountsJob;
use App\Jobs\SaltEdgeListLoginsJob;
use App\Jobs\SaltEdgeListTransactionsJob;
use App\Jobs\SyncAccountsJob;
use App\Jobs\SyncTransactionsJob;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * @NOTE
         * The main idea (for now), is that these calls are decoupled on purpose.
         * Future refactoring should prove this can be handled via a queue/job
         * and I intend to give them a sole purpose and not be depended on the workflow
         * (since this might change later on).
         */

        $startTime = microtime(true);
        $this->line('Starting import run');

        // CURRENT WORKFLOW
        // SA Login
        // SA Accounts
        // FF Accounts
        // SyncAccounts
        // SA Transactions
        // FF Transactions
        // SyncTransactions
        SaltEdgeListLoginsJob::withChain([
            new SaltEdgeListAccountsJob,
            new FireflyAccountsJob,
            new SyncAccountsJob,
            new SaltEdgeListTransactionsJob,
            new FireflyTransactionsJob,
            new SyncTransactionsJob
        ])->dispatch();

        $endTime = round(microtime(true) - $startTime, 4);
        $this->comment(sprintf('Queued the workflow in %s second(s).', $endTime));
    }
}
