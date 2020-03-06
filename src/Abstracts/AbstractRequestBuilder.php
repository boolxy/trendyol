<?php

namespace BoolXY\Trendyol\Abstracts;

use BoolXY\Trendyol\Interfaces\IRequest;
use BoolXY\Trendyol\RequestManager;

class AbstractRequestBuilder
{
    protected array $data = [];

    protected RequestManager $requestManager;

    public function __construct(RequestManager $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    protected function process()
    {
        return $this->requestManager->process($this->getRequest()->setData($this->data));
    }

    /**
     * Override this
     * @return IRequest
     */
    protected function getRequest(): IRequest
    {
    }
}
