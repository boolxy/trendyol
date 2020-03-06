<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Models\Product;
use BoolXY\Trendyol\ParameterFactory;

class ProductServiceTest extends TestCase
{
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

    /** @test */
    public function testGetProviders()
    {
        $results = $this->trendyol->productService()->getProviders();

        $this->assertIsArray($results);
        $this->assertTrue(count($results) > 0);
    }

    /** @test */
    public function testGetSuppliersAddresses()
    {
        $results = $this->trendyol->productService()->getSuppliersAddresses();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("supplierAddresses", $results);
        $this->assertObjectHasAttribute("defaultShipmentAddress", $results);
        $this->assertObjectHasAttribute("defaultInvoiceAddress", $results);
        $this->assertObjectHasAttribute("defaultReturningAddress", $results);
    }

    /** @test */
    public function testGetBatchRequestResult()
    {
        $batchRequestId = '5631d1a1-ec81-496f-9407-99876554433-1529820717'; // Example
        $results = $this->trendyol->productService()->getBatchRequestResult($batchRequestId);

        $this->assertObjectHasAttribute("batchRequestId", $results);
        $this->assertObjectHasAttribute("items", $results);
        $this->assertIsArray($results->items);
    }

    /** @test */
    public function testGetProducts()
    {
        $results = $this->trendyol->productService()->getProducts();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("totalElements", $results);
        $this->assertObjectHasAttribute("totalPages", $results);
        $this->assertObjectHasAttribute("page", $results);
        $this->assertObjectHasAttribute("size", $results);
        $this->assertObjectHasAttribute("content", $results);
        $this->assertIsArray($results->content);
    }

    /** @test */
    public function testGettingProducts()
    {
        $results = $this->trendyol->productService()->gettingProducts()->get();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("totalElements", $results);
        $this->assertObjectHasAttribute("totalPages", $results);
        $this->assertObjectHasAttribute("page", $results);
        $this->assertObjectHasAttribute("size", $results);
        $this->assertObjectHasAttribute("content", $results);
        $this->assertIsArray($results->content);
    }

    /** @test */
    public function testUpdatingPriceAndInventory()
    {
        $results = $this->trendyol->productService()
            ->updatingPriceAndInventory()
            ->addItem("8680000000", 100, 112.85, 113.85)
            ->update();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("batchRequestId", $results);
    }

//    /** @test */
//    public function testCreateProducts()
//    {
//        $product = $this->getTestProduct1();
//        $parameters = ParameterFactory::createProductsParameters()->addProduct($product);
//        $results = $this->trendyol->productService()->createProducts($parameters);
//    }
}
