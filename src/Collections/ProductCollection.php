<?php

namespace BoolXY\Trendyol\Collections;

use BoolXY\Trendyol\AbstractCollection;
use BoolXY\Trendyol\ICollection;
use BoolXY\Trendyol\Models\Product;

class ProductCollection extends AbstractCollection implements ICollection
{
    /**
     * @param Product $item
     */
    public function add(Product $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return Product
     */
    public function current()
    {
        return $this->items[$this->position];
    }
}