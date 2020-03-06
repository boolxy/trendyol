<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\Models\Product;
use BoolXY\Trendyol\Requests\ProductService\CreateProducts;

class CreateProductsRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * @return CreateProducts
     */
    protected function getRequest(): CreateProducts
    {
        return CreateProducts::create()
            ->setQueryParams([
                "supplierId" => $this->requestManager->getClient()->getSupplierId(),
            ]);
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product): self
    {
        $this->data["items"][] = $product->toArray();

        return $this;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->process();
    }
}
