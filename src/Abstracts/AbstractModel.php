<?php

namespace BoolXY\Trendyol\Abstracts;

use BoolXY\Trendyol\Interfaces\IModel;
use BoolXY\Trendyol\Traits\TJsonable;

abstract class AbstractModel implements IModel
{
    use TJsonable;

    public static function create()
    {
        return new static();
    }
}
