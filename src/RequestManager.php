<?php

namespace BoolXY\Trendyol;

use GuzzleHttp\RequestOptions;

class RequestManager
{
    private Client $client;

    /**
     * RequestManager constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Process the request
     *
     * @param IRequest $request
     * @return object
     */
    public function process(IRequest $request): object
    {
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

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
