<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Enums\OrderByDirection;
use BoolXY\Trendyol\Enums\ShipmentOrderBy;
use BoolXY\Trendyol\Enums\ShipmentStatus;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\OrderService\GetShipmentPackages;

class GetShipmentPackagesRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * GetShipmentPackagesRequestBuilder constructor.
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(GetShipmentPackages::create([
            "supplierId" => $this->requestManager->getClient()->getSupplierId(),
        ]));
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function startDate(int $timestamp): self
    {
        $this->request->addData("startDate", $timestamp);

        return $this;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function endDate(int $timestamp): self
    {
        $this->request->addData("endDate", $timestamp);

        return $this;
    }

    /**
     * @param int $pageNumber
     * @return $this
     */
    public function page(int $pageNumber): self
    {
        $this->request->addData("page", $pageNumber);

        return $this;
    }

    /**
     * @param int $size
     * @return $this
     */
    public function size(int $size): self
    {
        $this->request->addData("size", $size);

        return $this;
    }

    /**
     * @param string $orderNumber
     * @return $this
     */
    public function orderNumber(string $orderNumber): self
    {
        $this->request->addData("orderNumber", $orderNumber);

        return $this;
    }

    /**
     * @param ShipmentStatus $shipmentStatus
     * @return $this
     */
    public function status(ShipmentStatus $shipmentStatus): self
    {
        $this->request->addData("shipmentStatus", (string) $shipmentStatus);

        return $this;
    }

    /**
     * @param ShipmentOrderBy $orderBy
     * @return $this
     */
    public function orderByField(ShipmentOrderBy $orderBy): self
    {
        $this->request->addData("orderByField", (string) $orderBy);

        return $this;
    }

    /**
     * @param OrderByDirection $direction
     * @return $this
     */
    public function orderByDirection(OrderByDirection $direction): self
    {
        $this->request->addData("orderByDirection", (string) $direction);

        return $this;
    }

    /**
     * @param string $shipmentPackageIds
     * @return $this
     */
    public function shipmentPackageIds(string $shipmentPackageIds): self
    {
        $this->request->addData("shipmentPackageIds", $shipmentPackageIds);

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
