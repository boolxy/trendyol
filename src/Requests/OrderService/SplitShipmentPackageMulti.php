<?php

namespace Boolxy\Trendyol\Requests\OrderService;

use Boolxy\Trendyol\Abstracts\AbstractRequest;
use Boolxy\Trendyol\Interfaces\IRequest;

class SplitShipmentPackageMulti extends AbstractRequest implements IRequest
{
    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_POST;
    }

    /**
     * {@inheritdoc}
     */
    public function getPathPattern(): string
    {
        return 'suppliers/$supplierId/shipment-packages/$shipmentPackageId/multi-split';
    }
}
