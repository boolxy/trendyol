<?php

namespace BoolXY\Trendyol\Requests\ProductService;

use BoolXY\Trendyol\AbstractRequest;
use BoolXY\Trendyol\IRequest;

class GetBrands extends AbstractRequest implements IRequest
{
    protected string $method = self::METHOD_GET;

    protected string $path = 'brands';
}
