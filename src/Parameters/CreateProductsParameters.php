<?php

namespace BoolXY\Trendyol\Parameters;

use BoolXY\Trendyol\AbstractParameters;
use BoolXY\Trendyol\IParameters;
use BoolXY\Trendyol\Models\Product;

class CreateProductsParameters extends AbstractParameters implements IParameters
{
    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product): self
    {
        $this->data["items"][] = $product->toJson();

        return $this;
    }
}
