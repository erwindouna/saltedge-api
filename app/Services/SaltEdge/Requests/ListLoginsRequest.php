<?php

namespace App\Services\SaltEdge\Requests;

use Illuminate\Support\Facades\Log;

class ListLoginsRequest extends SaltEdgeRequest
{
    /**
     * ListLoginsRequest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function call(): void
    {
        $uri = '/logins';
        $response = $this->getRequest($uri);

        if (null === $response) {
            Log::error('Could not continue processing. Please see the error logs for further details.');
            return;
        }

        dd($response);
    }
}