<?php

namespace BoolXY\Trendyol;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

abstract class AbstractService
{
    private Client $client;

    /**
     * AbstractService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get()
    {
        $request = "sezai";

        $method = $request->getMethod();

        $path = $request->getPath();

        $data = $request->getData();

        $result = $this->client->$method($path, [
            RequestOptions::SYNCHRONOUS => false,
            RequestOptions::HEADERS => [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
                "data" => $data,
            ],
        ]);

        return json_decode((string) $result->getBody());
    }
}
