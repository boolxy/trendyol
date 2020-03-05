<?php

namespace BoolXY\Trendyol;

abstract class AbstractParameters implements IParameters
{
    protected array $data = [];

    /**
     * @return array
     */
    public function toArray(): array
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
}
