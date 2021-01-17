<?php

namespace Boolxy\Trendyol\Builders;

use Boolxy\Trendyol\Abstracts\AbstractRequestBuilder;
use Boolxy\Trendyol\Interfaces\IRequestBuilder;
use Boolxy\Trendyol\RequestManager;
use Boolxy\Trendyol\Requests\OrderService\SplitShipmentPackage;

class SplitShipmentPackageRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * SplitShipmentPackagesRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(SplitShipmentPackage::create([
            'supplierId' => $this->requestManager->getClient()->getSupplierId(),
        ]));
    }

    /**
     * @param int $shipmentPackageId
     *
     * @return $this
     */
    public function setShipmentPackageId(int $shipmentPackageId): self
    {
        $this->request->addQueryParam('shipmentPackageId', $shipmentPackageId);

        return $this;
    }

    /**
     * @param int $orderLineId
     *
     * @return $this
     */
    public function addOrderLineId(int $orderLineId): self
    {
        $this->request->addData('orderLineIds', $orderLineId, true);

        return $this;
    }

    /**
     * @return mixed
     */
    public function split()
    {
        return $this->process();
    }
}
