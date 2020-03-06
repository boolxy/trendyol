<?php

namespace BoolXY\Trendyol\Abstracts;

use BoolXY\Trendyol\Interfaces\IParameters;

abstract class AbstractParameters implements IParameters
{
    protected array $data = [];

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->data);
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return $this->data;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key = null)
    {
        return isset($key) && is_string($key)
            ? $this->data[$key]
            : $this->data;
    }
}
