<?php

namespace Boolxy\Trendyol\Abstracts;

use Boolxy\Trendyol\RequestManager;

abstract class AbstractService
{
    protected RequestManager $requestManager;

    /**
     * AbstractService constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        $this->requestManager = $requestManager;
    }
}
