<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\Abstracts\AbstractService;
use BoolXY\Trendyol\Builders\GetShipmentPackagesRequestBuilder;
use BoolXY\Trendyol\Interfaces\IService;
use BoolXY\Trendyol\Requests\OrderService\UpdateTrackingNumber;

class OrderService extends AbstractService implements IService
{
    /**
     * @return GetShipmentPackagesRequestBuilder
     */
    public function gettingShipmentPackages(): GetShipmentPackagesRequestBuilder
    {
        return new GetShipmentPackagesRequestBuilder($this->requestManager);
    }

    /**
     * @param int $shipmentPackageId
     * @param string $trackingNumber
     * @return mixed
     */
    public function updateTrackingNumber(int $shipmentPackageId, string $trackingNumber)
    {
        $request = UpdateTrackingNumber::create([
            "trackingNumber" => $trackingNumber,
        ])->setQueryParams([
            "supplierId" => $this->requestManager->getClient()->getSupplierId(),
            "shipmentPackageId" => $shipmentPackageId,
        ]);

        return $this->requestManager->process($request);
    }
}
