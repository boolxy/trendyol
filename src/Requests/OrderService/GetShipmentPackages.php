<?php

namespace Boolxy\Trendyol\Requests\OrderService;

use Boolxy\Trendyol\Abstracts\AbstractRequest;
use Boolxy\Trendyol\Interfaces\IRequest;

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
