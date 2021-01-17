<?php

namespace Boolxy\Trendyol\Abstracts;

use Boolxy\Trendyol\Interfaces\IRequest;
use Boolxy\Trendyol\RequestManager;

class AbstractRequestBuilder
{
    protected IRequest $request;

    protected RequestManager $requestManager;

    /**
     * AbstractRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    /**
     * @param IRequest $request
     *
     * @return $this
     */
    public function setRequest(IRequest $request): self
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return IRequest
     */
    public function getRequest(): IRequest
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    protected function process()
    {
        return $this->requestManager->process($this->request);
    }
}
