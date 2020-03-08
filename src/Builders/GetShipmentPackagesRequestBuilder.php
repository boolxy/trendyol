<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Enums\OrderByDirection;
use BoolXY\Trendyol\Enums\ShipmentOrderBy;
use BoolXY\Trendyol\Enums\ShipmentStatus;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\Requests\OrderService\GetShipmentPackages;

class GetShipmentPackagesRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * @return GetShipmentPackages
     */
    protected function getRequest(): GetShipmentPackages
    {
        return GetShipmentPackages::create()
            ->setQueryParams([
                "supplierId" => $this->requestManager->getClient()->getSupplierId(),
            ]);
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
     * @param int $size
     * @return $this
     */
    public function size(int $size): self
    {
        $this->data["size"] = $size;

        return $this;
    }

    /**
     * @param string $orderNumber
     * @return $this
     */
    public function orderNumber(string $orderNumber): self
    {
        $this->data["orderNumber"] = $orderNumber;

        return $this;
    }

    /**
     * @param ShipmentStatus $shipmentStatus
     * @return $this
     */
    public function status(ShipmentStatus $shipmentStatus): self
    {
        $this->data["shipmentStatus"] = (string) $shipmentStatus;

        return $this;
    }

    /**
     * @param ShipmentOrderBy $orderBy
     * @return $this
     */
    public function orderByField(ShipmentOrderBy $orderBy): self
    {
        $this->data["orderByField"] = (string) $orderBy;

        return $this;
    }

    /**
     * @param OrderByDirection $direction
     * @return $this
     */
    public function orderByDirection(OrderByDirection $direction): self
    {
        $this->data["orderByDirection"] = (string) $direction;

        return $this;
    }

    /**
     * @param string $shipmentPackageIds
     * @return $this
     */
    public function shipmentPackageIds(string $shipmentPackageIds): self
    {
        $this->data["shipmentPackageIds"] = $shipmentPackageIds;

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
