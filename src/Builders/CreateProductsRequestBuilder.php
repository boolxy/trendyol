<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\Models\Product;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\ProductService\CreateProducts;

class CreateProductsRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * CreateProductsRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(CreateProducts::create([
            'supplierId' => $this->requestManager->getClient()->getSupplierId(),
        ]));
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function addProduct(Product $product): self
    {
        $this->request->addData('items', $product->toArray(), true);

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
