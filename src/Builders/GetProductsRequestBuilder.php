<?php

namespace Boolxy\Trendyol\Builders;

use Boolxy\Trendyol\Abstracts\AbstractRequestBuilder;
use Boolxy\Trendyol\Enums\DateQueryType;
use Boolxy\Trendyol\Interfaces\IRequestBuilder;
use Boolxy\Trendyol\RequestManager;
use Boolxy\Trendyol\Requests\ProductService\GetProducts;

class GetProductsRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * GetProductsRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(GetProducts::create([
            'supplierId' => $this->requestManager->getClient()->getSupplierId(),
        ]));
    }

    /**
     * @param bool $is
     *
     * @return $this
     */
    public function approved(bool $is): self
    {
        $this->request->addQueryParam('approved', $is ? 'true' : 'false');

        return $this;
    }

    /**
     * @param string $barcode
     *
     * @return $this
     */
    public function barcode(string $barcode): self
    {
        $this->request->addQueryParam('barcode', $barcode);

        return $this;
    }

    /**
     * @param int $timestamp
     *
     * @return $this
     */
    public function startDate(int $timestamp = null): self
    {
        $this->request->addQueryParam('startDate', $timestamp);

        return $this;
    }

    /**
     * @param int $timestamp
     *
     * @return $this
     */
    public function endDate(int $timestamp = null): self
    {
        $this->request->addQueryParam('endDate', $timestamp);

        return $this;
    }

    /**
     * @param int $pageNumber
     *
     * @return $this
     */
    public function page(int $pageNumber): self
    {
        $this->request->addQueryParam('page', $pageNumber);

        return $this;
    }

    /**
     * @param DateQueryType $dateQueryType
     *
     * @return $this
     */
    public function dateQueryType(DateQueryType $dateQueryType): self
    {
        $this->request->addQueryParam('dateQueryType', (string) $dateQueryType);

        return $this;
    }

    /**
     * @param int $size
     *
     * @return $this
     */
    public function size(int $size): self
    {
        $this->request->addQueryParam('size', $size);

        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->process();
    }
}
