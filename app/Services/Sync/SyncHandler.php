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

    public function determineFFAccountType($saAccountType): ?string
    {
        /**
         * SA logic: nature = account, savings, mortgage (supported thus far)
         */
        switch ($saAccountType) {
            case ($saAccountType == 'account' || $saAccountType == 'savings'):
                return 'asset';
                break;
            case 'mortgage':
                return 'liability';
                break;
            default:
                Log::error(sprintf('Could not handle the current SA account type %s.', $saAccountType));
                return null;
                break;
        }
    }
}