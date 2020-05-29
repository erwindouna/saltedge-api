<?php

namespace App\Services\Firefly\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class FireflyRequest
{
    private $accesToken;
    private $refreshToken;

    public function __construct()
    {
        Log::debug('Initializing Firefly requester.');
        $this->accesToken = Config::get('edapi.firefly.api.access_token');
        $this->refreshToken = Config::get('edapi.firefly.api.refresh_token');
    }

    abstract public function call(): void;

    /**
     * @TODO: might be duplicated, refactor later on to a generic abstract class. If, no specialization is needed.
     * @param $uri
     * @return array|null
     */
    protected function getRequest($uri): ?array
    {
        $this->generateHeaders();
        $startTime = microtime(true);
        $url = $this->constructURL($uri);
        Log::info(sprintf('Performing Firefly getRequest to "%s".', $url));

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
     * @return array
     */
    private function generateHeaders(): array
    {
        Log::info('Initializing OAuth2 authorization headers.');
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->accesToken
        ];
    }

    /**
     * @param string $uri
     * @return string
     */
    protected function constructURL(string $uri): string
    {
        $server = Config::get('edapi.firefly.server');
        $apiVersion = '/api/' . Config::get('edapi.firefly.api.version') . '/';

        return $server . $apiVersion . $uri;
    }

}