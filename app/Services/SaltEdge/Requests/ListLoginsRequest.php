<?php

namespace App\Services\SaltEdge\Requests;

use App\Repositories\SaltEdge\CustomerRepository;
use App\Services\SaltEdge\Objects\Login;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ListLoginsRequest extends SaltEdgeRequest
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $saltEdgeCustomers;

    /**
     * ListLoginsRequest constructor.
     *
     * From the official documentation: "The central entity of the API, representing a connection between a customer’s bank and Salt Edge."
     * Basically this tells how much bank accounts are linked on Salt Edge. Expect to get more connections later on
     * @TODO: build-in a loop mechanism to handle more logins/connections.
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

        if (!isset($response['body']['data'])) {
            Log::error('The data structure returned seems unrecognized.');
            return;
        }

        $collection = new Collection;
        foreach ($response['body']['data'] as $loginArray) {
            $collection->push(new Login($loginArray));
        }

        // @TODO: Maybe add some sorting later on?
        // @TODO: for sure make it loop, on the request if I intend to get more connections
        foreach ($collection as $k => $c) {
            $customer = new CustomerRepository;
            $customer = $customer->findByCustomerId($c->getCustomerId());

            if (null === $customer) {
                $customer = new CustomerRepository;
                $customer->store($c);
            } else {
                $customer->object = serialize($c);
                $customer->hash = hash('sha256', serialize($c));
                $customer->save();
            }
        }
    }
}