<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\AbstractService;
use BoolXY\Trendyol\Collections\ProductCollection;
use BoolXY\Trendyol\IService;
use BoolXY\Trendyol\Models\Product;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\ProductService\GetAttributes;
use BoolXY\Trendyol\Requests\ProductService\GetBrands;
use BoolXY\Trendyol\Requests\ProductService\GetBrandsByName;
use BoolXY\Trendyol\Requests\ProductService\GetCategories;

class ProductService extends AbstractService implements IService
{
    private ?ProductCollection $products = null;

    /**
     * ProductService constructor.
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->products = new ProductCollection();
    }

    /**
     * Add a product
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product): self
    {
        $this->products->add($product);

        return $this;
    }

    /**
     * Get your added product stack
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

    /**
     * Get brands
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getBrands(int $page = 1, int $size = 10)
    {
        $request = GetBrands::create([
            "page" => $page,
            "size" => $size,
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * Get brands by name
     * @param string $name
     * @return mixed
     */
    public function getBrandsByName(string $name)
    {
        $request = GetBrandsByName::create([
            "name" => $name,
        ]);

        return $this->requestManager->process($request);
    }

    public function getCategories()
    {
        $request = GetCategories::create();

        return $this->requestManager->process($request);
    }

    public function getAttributes(int $categoryId)
    {
        $request = GetAttributes::create([
            "categoryId" => $categoryId,
        ]);

        return $this->requestManager->process($request);
    }

    public function create()
    {
        // TODO: Create the products on Trendyol
    }
}
