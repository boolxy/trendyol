<?php

namespace Boolxy\Trendyol\Builders;

use Boolxy\Trendyol\Abstracts\AbstractRequestBuilder;
use Boolxy\Trendyol\Interfaces\IRequestBuilder;
use Boolxy\Trendyol\RequestManager;
use Boolxy\Trendyol\Requests\OrderService\SplitShipmentPackageMulti;

class SplitShipmentPackageMultiRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * SplitShipmentPackagesRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(SplitShipmentPackageMulti::create([
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
     * @param array $orderLineIds
     *
     * @return $this
     */
    public function addGroup(array $orderLineIds): self
    {
        $this->request->addData('splitGroups', [
            'orderLineIds' => $orderLineIds,
        ], true);

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
