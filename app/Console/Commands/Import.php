<?php

namespace App\Console\Commands;

use App\Services\SaltEdge\Requests\ListLoginsRequest;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:test';

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
        $startTime = microtime(true);
        $this->line('Starting tests');
        $saltEdge = app(ListLoginsRequest::class);
        $saltEdge->call();

        $endTime = round(microtime(true) - $startTime, 4);
        $this->comment(sprintf('Finished the test in %s second(s).', $endTime));
    }
}
