<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\Requests\ProductService\GetProducts;

class GetProductsRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * @return GetProducts
     */
    protected function getRequest(): GetProducts
    {
        return GetProducts::create()
            ->setQueryParams([
                "supplierId" => $this->requestManager->getClient()->getSupplierId(),
            ]);
    }

    /**
     * @param bool $is
     * @return $this
     */
    public function approved(bool $is): self
    {
        $this->data["approved"] = $is ? "true" : "false";

        return $this;
    }

    /**
     * @param string $barcode
     * @return $this
     */
    public function barcode(string $barcode): self
    {
        $this->data["barcode"] = $barcode;

        return $this;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function startDate(int $timestamp): self
    {
        $this->data["startDate"] = $timestamp;

        return $this;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function endDate(int $timestamp): self
    {
        $this->data["endDate"] = $timestamp;

        return $this;
    }

    /**
     * @param int $pageNumber
     * @return $this
     */
    public function page(int $pageNumber): self
    {
        $this->data["page"] = $pageNumber;

        return $this;
    }

    /**
     * @param string $dataQueryType
     * @return $this
     */
    public function dataQueryType(string $dataQueryType): self
    {
        $this->data["dataQueryType"] = (string) $dataQueryType;

        return $this;
    }

    /**
     * @param int $size
     * @return $this
     */
    public function size(int $size): self
    {
        $this->data["size"] = $size;

        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return parent::process();
    }
}
