<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SalteEdgeAPI\Services\Requests\SaltEdgeRequest;


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
        $this->line('starting tests');
        $saltEdge = new SaltEdgeRequest();
    }
}
