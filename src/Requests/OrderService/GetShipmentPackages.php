<?php

namespace BoolXY\Trendyol\Requests\OrderService;

use BoolXY\Trendyol\Abstracts\AbstractRequest;
use BoolXY\Trendyol\Interfaces\IRequest;

class GetShipmentPackages extends AbstractRequest implements IRequest
{
    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    /**
     * {@inheritdoc}
     */
    public function getPathPattern(): string
    {
        return 'suppliers/$supplierId/orders?status=$status&startDate=$startDate&endDate=$endDate'.
            '&orderByField=$orderByField&orderByDirection=$orderByDirection&page=$page'.
            '&size=$size&shipmentPackageIds=$shipmentPackageIds&orderNumber=$orderNumber';
    }
}
