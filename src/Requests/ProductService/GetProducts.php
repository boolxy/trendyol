<?php

namespace Boolxy\Trendyol\Requests\ProductService;

use Boolxy\Trendyol\Abstracts\AbstractRequest;
use Boolxy\Trendyol\Interfaces\IRequest;

class GetProducts extends AbstractRequest implements IRequest
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
        return 'suppliers/$supplierId/products?'.
            'approved=$approved&barcode=$barcode&startDate=$startDate&'.
            'endDate=$endDate&page=$page&dateQueryType=$dateQueryType&size=$size';
    }
}
