<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Collections\ProductCollection;

class ProductServiceTest extends TestCase
{
    /** @test */
    public function testProductsCanBeAdded()
    {
        $service = $this->trendyol->productService();

        $product1 = $this->getTestProduct1();
        $product2 = $this->getTestProduct1Variation();

        $products = $service
            ->addProduct($product1)
            ->addProduct($product2)
            ->getProducts();

        $this->assertNotNull($products);
        $this->assertInstanceOf(ProductCollection::class, $products);
        $this->assertCount(2, $products);
    }
}
