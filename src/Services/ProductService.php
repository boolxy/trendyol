<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\AbstractService;
use BoolXY\Trendyol\Collections\ProductCollection;
use BoolXY\Trendyol\IService;

class ProductService extends AbstractService implements IService
{
    public function createProducts(ProductCollection $products)
    {
        var_dump($products);
    }
}
