<?php

namespace Boolxy\Trendyol\Requests\SettlementService;

use Boolxy\Trendyol\Abstracts\AbstractRequest;
use Boolxy\Trendyol\Interfaces\IRequest;

class GetSettlements extends AbstractRequest implements IRequest
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
        return 'suppliers/$supplierId/settlements?barcode=$barcode&'.
            'dateType=$dateType&startDate=$startDate&endDate=$endDate&page=$page&size=$size&orderNumber=$orderNumber&'.
            'shipmentPackageIds=$shipmentPackageIds&transactionTypeName=$transactionTypeName';
    }
}
