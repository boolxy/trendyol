<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Enums\DataQueryType;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\ProductService\GetProducts;

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
        $this->request->addData('approved', $is ? 'true' : 'false');

        return $this;
    }

    /**
     * @param string $barcode
     *
     * @return $this
     */
    public function barcode(string $barcode): self
    {
        $this->request->addData('barcode', $barcode);

        return $this;
    }

    /**
     * @param int $timestamp
     *
     * @return $this
     */
    public function startDate(int $timestamp): self
    {
        $this->request->addData('startDate', $timestamp);

        return $this;
    }

    /**
     * @param int $timestamp
     *
     * @return $this
     */
    public function endDate(int $timestamp): self
    {
        $this->request->addData('endDate', $timestamp);

        return $this;
    }

    /**
     * @param int $pageNumber
     *
     * @return $this
     */
    public function page(int $pageNumber): self
    {
        $this->request->addData('page', $pageNumber);

        return $this;
    }

    /**
     * @param DataQueryType $dataQueryType
     *
     * @return $this
     */
    public function dataQueryType(DataQueryType $dataQueryType): self
    {
        $this->request->addData('dataQueryType', (string) $dataQueryType);

        return $this;
    }

    /**
     * @param int $size
     *
     * @return $this
     */
    public function size(int $size): self
    {
        $this->request->addData('size', $size);

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
