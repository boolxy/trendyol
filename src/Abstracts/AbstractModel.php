<?php

namespace BoolXY\Trendyol\Abstracts;

use BoolXY\Trendyol\Interfaces\IModel;
use BoolXY\Trendyol\Traits\TJsonable;

abstract class AbstractModel implements IModel
{
    use TJsonable;

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public static function create(array $attributes = [])
    {
        return new static($attributes);
    }
}
