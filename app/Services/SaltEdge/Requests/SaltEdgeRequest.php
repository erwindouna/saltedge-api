<?php

namespace App\Services\SaltEdge\Requests;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class SaltEdgeRequest
{
    private $appID;
    private $secretKey;

    public function __construct()
    {
        Log::debug("Initializing main Requester.");
        $this->appID = Config::get('edapi.saltedge.api.app_id');
        $this->secretKey = Config::get('edapi.saltedge.api.secret');
    }

    /**
     * Abstract function that will be specialized in its own implementation
     */
    abstract public function call(): void;

    /**
     * @param string $uri
     * @return array|null
     */
    protected function getRequest(string $uri): ?array
    {
        $startTime = microtime(true);
        $url = $this->constructURL($uri);
        Log::info(sprintf('Performing SaltEdge getRequest to "%s".', $url));

        try {
            $httpClient = Http::withHeaders($this->generateHeaders())->get($url);
        } catch (Exception $e) {
            Log::error(sprintf('Error on Guzzle getRequest. Exception thrown: %s', $e->getMessage()));
            return null;
        }

        $endTime = round(microtime(true) - $startTime, 6);
        Log::info(sprintf('Response received back in %s second(s).', $endTime));

        // A different status code, other than hTTP 200 was returned
        if (200 !== (int)$httpClient->status()) {
            Log::error(sprintf('Invalid response returned. Status code: %s, with message: %s', $httpClient->status(), $httpClient->body()));
            return null;
        }

        $response['body'] = json_decode($httpClient->body(), true);
        $response['headers'] = $httpClient->headers();
        $response['statusCode'] = $httpClient->status();
        Log::info(sprintf('Proper HTTP status %s returned. Returning array response.', $httpClient->status()));

        return $response;
    }

    /**
     * Generate HTTP headers used for the calls
     * @return array
     */
    protected function generateHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'App-Id' => $this->appID,
            'Secret' => $this->secretKey,
        ];
    }

    /**
     * @param string $uri
     * @return string
     */
    protected function constructURL(string $uri): string
    {
        $server = Config::get('edapi.saltedge.server');
        $apiVersion = '/api/' . Config::get('edapi.saltedge.api.version') . '/';

        return $server . $apiVersion . $uri;
    }

    protected function postRequest(string $uri): bool
    {

        return true;
    }

}