<?php
declare(strict_types=1);

namespace App\Application\Api;

class RequestPerformer
{
    private Client $client;

    private RequestInterface $request;

    public function __construct(Client $client, RequestInterface $request)
    {
        $this->client = $client;
        $this->request = $request;
    }

    public function performRequest(): void
    {
        $response = $this->client->sendRequest($this->request);
        //process response
    }
}
