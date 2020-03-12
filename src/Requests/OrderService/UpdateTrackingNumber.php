<?php

namespace BoolXY\Trendyol\Requests\OrderService;

use BoolXY\Trendyol\Abstracts\AbstractRequest;
use BoolXY\Trendyol\Interfaces\IRequest;

class UpdateTrackingNumber extends AbstractRequest implements IRequest
{
    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_PUT;
    }

    /**
     * {@inheritdoc}
     */
    public function getPathPattern(): string
    {
        return 'suppliers/$supplierId/$shipmentPackageId/update-tracking-number';
    }
}
