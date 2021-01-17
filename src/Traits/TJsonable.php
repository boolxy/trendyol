<?php

namespace Boolxy\Trendyol\Traits;

trait TJsonable
{
    public function toJson()
    {
        return json_encode($this->jsonSerialize());
    }
}
