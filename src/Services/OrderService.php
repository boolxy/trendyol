<?php

namespace Boolxy\Trendyol\Services;

use Boolxy\Trendyol\Abstracts\AbstractService;
use Boolxy\Trendyol\Builders\GetShipmentPackagesRequestBuilder;
use Boolxy\Trendyol\Builders\SplitShipmentPackageByQuantityRequestBuilder;
use Boolxy\Trendyol\Builders\SplitShipmentPackageMultiRequestBuilder;
use Boolxy\Trendyol\Builders\SplitShipmentPackageRequestBuilder;
use Boolxy\Trendyol\Builders\UpdatePackageRequestBuilder;
use Boolxy\Trendyol\Interfaces\IService;
use Boolxy\Trendyol\Requests\OrderService\SendInvoiceLink;
use Boolxy\Trendyol\Requests\OrderService\UpdateTrackingNumber;

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
     * @param int    $shipmentPackageId
     * @param string $trackingNumber
     *
     * @return mixed
     */
    public function updateTrackingNumber(int $shipmentPackageId, string $trackingNumber)
    {
        $request = UpdateTrackingNumber::create([
            'supplierId'        => $this->requestManager->getClient()->getSupplierId(),
            'shipmentPackageId' => $shipmentPackageId,
        ], [
            'trackingNumber' => $trackingNumber,
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
     * @param int    $shipmentPackageId
     *
     * @return mixed
     */
    public function sendInvoiceLink(string $invoiceLink, int $shipmentPackageId)
    {
        $request = SendInvoiceLink::create([
            'supplierId' => $this->requestManager->getClient()->getSupplierId(),
        ])
            ->addData('invoiceLink', $invoiceLink)
            ->addData('shipmentPackageId', $shipmentPackageId);

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
