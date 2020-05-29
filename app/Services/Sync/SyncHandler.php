<?php

namespace App\Services\Sync;

use Illuminate\Support\Facades\Log;

abstract class SyncHandler
{
    public function __construct()
    {
        Log::debug('Initializing Sync Handler.');
    }

    abstract public function call(): void;

}