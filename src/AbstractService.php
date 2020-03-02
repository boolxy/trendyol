<?php

namespace BoolXY\Trendyol;

use GuzzleHttp\Client;

abstract class AbstractService
{
    protected RequestManager $requestManager;

    /**
     * AbstractService constructor.
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        $this->requestManager = $requestManager;
    }
}
