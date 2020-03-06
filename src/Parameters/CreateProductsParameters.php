<?php

namespace BoolXY\Trendyol\Parameters;

use BoolXY\Trendyol\Abstracts\AbstractParameters;
use BoolXY\Trendyol\Interfaces\IParameters;
use BoolXY\Trendyol\Models\Product;

class CreateProductsParameters extends AbstractParameters implements IParameters
{
    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product): self
    {
        $this->data["items"][] = $product->toArray();

        return $this;
    }
}
