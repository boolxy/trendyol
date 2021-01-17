<?php

namespace Boolxy\Trendyol\Abstracts;

use Boolxy\Trendyol\Interfaces\IModel;
use Boolxy\Trendyol\Traits\TJsonable;

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
