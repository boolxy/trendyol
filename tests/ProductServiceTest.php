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

    /** @test */
    public function testGetBrands()
    {
        $results = $this->trendyol->productService()->getBrands(1, 3);

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("brands", $results);
        $this->assertCount(3, $results->brands);
    }

    /** @test */
    public function testGetBrandsByName()
    {
        $results = $this->trendyol->productService()->getBrandsByName("TRENDYOL");

        $this->assertIsArray($results);
        $this->assertTrue(count($results) > 0);
    }

    /** @test */
    public function testGetCategories()
    {
        $results = $this->trendyol->productService()->getCategories();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("categories", $results);
    }

    /** @test */
    public function testGetAttributes()
    {
        $results = $this->trendyol->productService()->getAttributes(387);

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("categoryAttributes", $results);
        $this->assertTrue(count($results->categoryAttributes) > 0);
    }
}
