<?php

namespace BoolXY\Trendyol\Interfaces;

use JsonSerializable;

interface ISerializable extends JsonSerializable
{
    public function toJson();
}
