<?php

namespace App\Jobs;

use App\Services\SaltEdge\Requests\ListLoginsRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SaltEdgeListLoginsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Starting SaltEdge ListLoginsRequest');
        $saltEdgeLogins = app(ListLoginsRequest::class);
        $saltEdgeLogins->call();
        Log::info('Finished SaltEdge ListLoginsRequest');
    }
}
