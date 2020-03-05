<?php

namespace BoolXY\Trendyol;

use BoolXY\Trendyol\Parameters\GetProductsParameters;
use BoolXY\Trendyol\Parameters\UpdatePriceAndInventoryParameters;

class ParameterFactory
{
    public static function getProductsParameters(): GetProductsParameters
    {
        return new GetProductsParameters();
    }

    public static function updatePriceAndInventoryParameters(): UpdatePriceAndInventoryParameters
    {
        return new UpdatePriceAndInventoryParameters();
    }
}
