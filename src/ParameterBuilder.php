<?php

namespace BoolXY\Trendyol;

use BoolXY\Trendyol\Parameters\ProductParameters;

class ParameterBuilder
{
    public function productParameters(): ProductParameters
    {
        return new ProductParameters();
    }

    public static function create(): self
    {
        return new static();
    }
}
