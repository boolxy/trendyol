<?php

namespace Boolxy\Trendyol\Interfaces;

use JsonSerializable;

interface ISerializable extends JsonSerializable
{
    public function toJson();
}
