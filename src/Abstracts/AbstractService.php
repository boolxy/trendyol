<?php

namespace BoolXY\Trendyol\Abstracts;

use BoolXY\Trendyol\RequestManager;

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
