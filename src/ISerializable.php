<?php

namespace BoolXY\Trendyol;

use JsonSerializable;

interface ISerializable extends JsonSerializable
{
    public function toJson();
}
