<?php

namespace BoolXY\Trendyol\Requests\ProductService;

use BoolXY\Trendyol\AbstractRequest;
use BoolXY\Trendyol\IRequest;

class UpdatePriceAndInventory extends AbstractRequest implements IRequest
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
        return 'suppliers/$supplierId/products/price-and-inventory';
    }
}