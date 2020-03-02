<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\AbstractService;
use BoolXY\Trendyol\Collections\ProductCollection;
use BoolXY\Trendyol\IService;
use BoolXY\Trendyol\Models\Product;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\ProductService\GetBrands;

class ProductService extends AbstractService implements IService
{
    private ?ProductCollection $products = null;

    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->products = new ProductCollection();
    }

    public function addProduct(Product $product): self
    {
        $this->products->add($product);

        return $this;
    }

    /**
     * @return ProductCollection
     */
    public function getProducts(): ProductCollection
    {
        return $this->products;
    }

    /**
     * @param ProductCollection $products
     */
    public function setProducts(ProductCollection $products): void
    {
        $this->products = $products;
    }

    public function getBrands()
    {
        return $this->requestManager->process(GetBrands::create());
    }

    public function create()
    {
        // TODO: Create the products on Trendyol
    }
}
