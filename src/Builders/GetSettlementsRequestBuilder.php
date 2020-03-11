<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Enums\SettlementDateType;
use BoolXY\Trendyol\Enums\SettlementTransactionType;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\SettlementService\GetSettlements;

class GetSettlementsRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * GetSettlementsRequestBuilder constructor.
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(new GetSettlements([
            "supplierId" => $this->requestManager->getClient()->getSupplierId(),
        ]));
    }

    /**
     * @param int $barcode
     * @return $this
     */
    public function barcode(int $barcode): self
    {
        $this->request->addQueryParam("barcode", $barcode);

        return $this;
    }

    /**
     * @param SettlementDateType $dateType
     * @return $this
     */
    public function dateType(SettlementDateType $dateType): self
    {
        $this->request->addQueryParam("dateType", (string) $dateType);

        return $this;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function startDate(int $timestamp): self
    {
        $this->request->addQueryParam("startDate", $timestamp);

        return $this;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function endDate(int $timestamp): self
    {
        $this->request->addQueryParam("endDate", $timestamp);

        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function page(int $page): self
    {
        $this->request->addQueryParam("page", $page);

        return $this;
    }

    /**
     * @param int $size
     * @return $this
     */
    public function size(int $size): self
    {
        $this->request->addQueryParam("size", $size);

        return $this;
    }

    /**
     * @param string $orderNumber
     * @return $this
     */
    public function orderNumber(string $orderNumber): self
    {
        $this->request->addQueryParam("orderNumber", $orderNumber);

        return $this;
    }

    /**
     * @param string $shipmentPackageIds
     * @return $this
     */
    public function shipmentPackageIds(string $shipmentPackageIds): self
    {
        $this->request->addQueryParam("shipmentPackageIds", $shipmentPackageIds);

        return $this;
    }

    /**
     * @param SettlementTransactionType $transactionType
     * @return $this
     */
    public function transactionTypeName(SettlementTransactionType $transactionType): self
    {
        $this->request->addQueryParam("transactionTypeName", (string) $transactionType);

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
