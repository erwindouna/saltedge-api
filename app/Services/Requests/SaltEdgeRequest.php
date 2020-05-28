<?php

namespace SalteEdgeAPI\Services\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

abstract class SaltEdgeRequest
{
    private $appID;
    private $secretKey;

    public function __construct()
    {
        Log::debug("Initializing main Requester.");
        $this->appID = Config::get('edapi.saltedge.app_id');
        $this->secretKey = Config::get('edapi.saltedge.secret');
    }

    /**
     * @return array
     */
    protected function generateHeaders(): array
    {
        return [
            'App-Id' => $this->appID,
            'Secret' => $this->secretKey
        ];
    }

}