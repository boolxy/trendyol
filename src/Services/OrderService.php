<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\Abstracts\AbstractService;
use BoolXY\Trendyol\Builders\GetShipmentPackagesRequestBuilder;
use BoolXY\Trendyol\Builders\SplitShipmentPackageByQuantityRequestBuilder;
use BoolXY\Trendyol\Builders\SplitShipmentPackageMultiRequestBuilder;
use BoolXY\Trendyol\Builders\SplitShipmentPackageRequestBuilder;
use BoolXY\Trendyol\Builders\UpdatePackageRequestBuilder;
use BoolXY\Trendyol\Interfaces\IService;
use BoolXY\Trendyol\Requests\OrderService\SendInvoiceLink;
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
            "supplierId" => $this->requestManager->getClient()->getSupplierId(),
            "shipmentPackageId" => $shipmentPackageId,
        ], [
            "trackingNumber" => $trackingNumber,
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * @return UpdatePackageRequestBuilder
     */
    public function updatingPackage(): UpdatePackageRequestBuilder
    {
        return new UpdatePackageRequestBuilder($this->requestManager);
    }

    /**
     * @param string $invoiceLink
     * @param int $shipmentPackageId
     * @return mixed
     */
    public function sendInvoiceLink(string $invoiceLink, int $shipmentPackageId)
    {
        $request = SendInvoiceLink::create([
            "supplierId" => $this->requestManager->getClient()->getSupplierId(),
        ])
            ->addData("invoiceLink", $invoiceLink)
            ->addData("shipmentPackageId", $shipmentPackageId);

        return $this->requestManager->process($request);
    }

    /**
     * @return SplitShipmentPackageRequestBuilder
     */
    public function splittingShipmentPackage(): SplitShipmentPackageRequestBuilder
    {
        return new SplitShipmentPackageRequestBuilder($this->requestManager);
    }

    /**
     * @return SplitShipmentPackageMultiRequestBuilder
     */
    public function splittingShipmentPackageMulti(): SplitShipmentPackageMultiRequestBuilder
    {
        return new SplitShipmentPackageMultiRequestBuilder($this->requestManager);
    }

    /**
     * @return SplitShipmentPackageByQuantityRequestBuilder
     */
    public function splittingShipmentPackageByQuantity(): SplitShipmentPackageByQuantityRequestBuilder
    {
        return new SplitShipmentPackageByQuantityRequestBuilder($this->requestManager);
    }
}
