<?php

namespace BoolXY\Trendyol;

trait TJsonable
{
    public function toJson()
    {
        return json_encode($this->jsonSerialize());
    }
}