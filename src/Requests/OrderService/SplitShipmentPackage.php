<?php

namespace BoolXY\Trendyol\Requests\OrderService;

use BoolXY\Trendyol\Abstracts\AbstractRequest;
use BoolXY\Trendyol\Interfaces\IRequest;

class SplitShipmentPackage extends AbstractRequest implements IRequest
{
    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return self::METHOD_POST;
    }

    /**
     * @inheritDoc
     */
    public function getPathPattern(): string
    {
        return 'suppliers/$supplierId/shipment-packages/$shipmentPackageId/split';
    }
}
