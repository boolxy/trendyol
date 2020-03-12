<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Enums\ShipmentStatus;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\OrderService\UpdatePackage;

class UpdatePackageRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * UpdatePackageRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(UpdatePackage::create([
            'supplierId' => $this->requestManager->getClient()->getSupplierId(),
        ]));
    }

    /**
     * @param int $packageId
     *
     * @return $this
     */
    public function setPackageId(int $packageId): self
    {
        $this->request->addQueryParam('id', $packageId);

        return $this;
    }

    /**
     * @param int $lineId
     * @param int $quantity
     *
     * @return $this
     */
    public function addLine(int $lineId, int $quantity): self
    {
        $this->request->addData('lines', [
            'lineId'   => $lineId,
            'quantity' => $quantity,
        ], true);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addParam(string $key, string $value): self
    {
        $params = $this->request->getData('params');
        $this->request->addData('params', array_merge($params ?? [], [$key => $value]));

        return $this;
    }

    public function setStatus(ShipmentStatus $status): self
    {
        $this->request->addData('status', (string) $status);

        return $this;
    }

    /**
     * @return mixed
     */
    public function update()
    {
        return $this->process();
    }
}
