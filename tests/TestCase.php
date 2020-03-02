<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Models\Product;
use BoolXY\Trendyol\Trendyol;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Main Class
     *
     * @var Trendyol
     */
    protected Trendyol $trendyol;

    /**
     * Setup
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->trendyol = new Trendyol(
            getenv("TRENDYOL_USER"),
            getenv("TRENDYOL_PASS"),
            getenv("TRENDYOL_SUPPLIER_ID"),
        );
    }

    protected function getTestProduct1()
    {
        $product = new Product();
        $product->setBarcode("barkod-1234");
        $product->setTitle("Bebek Takımı Pamuk");
        $product->setProductMainId("1234BT");
        $product->setBrandId(1791);
        $product->setCategoryId(411);
        $product->setQuantity(100);
        $product->setStockCode("STK-345");
        $product->setDimensionalWeight(2);
        $product->setDescription("Ürün açıklama bilgisi");
        $product->setCurrencyType("TRY");
        $product->setListPrice(250.99);
        $product->setSalePrice(120.99);
        $product->setVatRate(18);
        $product->setCargoCompanyId(10);
        $product->setShipmentAddressId(0);
        $product->setReturningAddressId(0);
        $product->addImage([
            "url" => "https://www.sampleadress/path/folder/image_1.jpg"
        ]);
        $product->addAttribute([
            "attributeId" => 338,
            "attributeValueId" => 6980
        ]);
        $product->addAttribute([
            "attributeId" => 343,
            "attributeValueId" => 4294
        ]);
        $product->addAttribute([
            "attributeId" => 346,
            "attributeValueId" => 4290
        ]);

        return $product;
    }

    protected function getTestProduct1Variation()
    {
        $product = new Product();
        $product->setBarcode("barkod-12345");
        $product->setTitle("Bebek Takımı Pamuk");
        $product->setProductMainId("1234BT");
        $product->setBrandId(1791);
        $product->setCategoryId(411);
        $product->setQuantity(100);
        $product->setStockCode("STK-3454");
        $product->setDimensionalWeight(2);
        $product->setDescription("Ürün açıklama bilgisi");
        $product->setCurrencyType("TRY");
        $product->setListPrice(250.99);
        $product->setSalePrice(120.99);
        $product->setVatRate(18);
        $product->setCargoCompanyId(10);
        $product->setShipmentAddressId(0);
        $product->setReturningAddressId(0);
        $product->addImage([
            "url" => "https://www.sampleadress/path/folder/image_2.jpg"
        ]);
        $product->addAttribute([
            "attributeId" => 338,
            "attributeValueId" => 6981
        ]);
        $product->addAttribute([
            "attributeId" => 343,
            "attributeValueId" => 4294
        ]);
        $product->addAttribute([
            "attributeId" => 346,
            "attributeValueId" => 4290
        ]);

        return $product;
    }
}
