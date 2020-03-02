<?php

namespace BoolXY\Trendyol;

abstract class AbstractCollection
{
    use TJsonable;

    protected int $position = 0;

    protected array $items = [];

    public function count()
    {
        return count($this->items);
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->items[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function jsonSerialize()
    {
        $arr = [];
        foreach ($this->items as $item) {
            $arr[] = $item->jsonSerialize();
        }
        return $arr;
    }
}