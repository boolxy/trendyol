<?php

namespace BoolXY\Trendyol\Requests\ProductService;

use BoolXY\Trendyol\AbstractRequest;
use BoolXY\Trendyol\IRequest;

class GetSuppliersAddresses extends AbstractRequest implements IRequest
{
    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    /**
     * @inheritDoc
     */
    public function getPathPattern(): string
    {
        return 'suppliers/$supplierId/addresses';
    }
}