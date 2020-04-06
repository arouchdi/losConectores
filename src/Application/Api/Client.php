<?php
declare(strict_types=1);

namespace App\Application\Api;

use GuzzleHttp\Client as ClientDriver;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private ClientDriver $driver;

    public function __construct(ClientDriver $driver)
    {
        $this->driver = $driver;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->driver->request($request->getMethod(), $request->getUri(), $request->getOptions());
    }
}
