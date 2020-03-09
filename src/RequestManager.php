<?php

namespace BoolXY\Trendyol;

use BoolXY\Trendyol\Exceptions\EmptyResponseException;
use BoolXY\Trendyol\Exceptions\InvalidArgumentException;
use BoolXY\Trendyol\Interfaces\IRequest;
use GuzzleHttp\Exception\ClientException;
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
     * @param IRequest $request
     * @return mixed
     * @throws EmptyResponseException|InvalidArgumentException
     */
    public function process(IRequest $request)
    {
        $method = $request->getMethod();
        $path = $request->getPath();
        $data = $request->getData();

        $response = null;

        try {
            $response = $this->client->$method($path, [
                RequestOptions::SYNCHRONOUS => false,
                RequestOptions::HEADERS => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $data,
            ]);
        } catch (ClientException $exception) {
            $message = $exception->getResponse()->getBody()->getContents();
            if (!empty($message)) {
                $object = json_decode($message);
                throw new InvalidArgumentException($object->errors[0]->message, $exception->getCode(), $exception);
            } else {
                throw new EmptyResponseException("Empty response", $exception->getCode(), $exception);
            }
        }

        return json_decode((string) $response->getBody());
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
