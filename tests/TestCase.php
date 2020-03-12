<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Models\Product;
use BoolXY\Trendyol\Trendyol;
use Illuminate\Support\Str;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Main Class.
     *
     * @var Trendyol
     */
    protected Trendyol $trendyol;

    /**
     * Setup.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->trendyol = new Trendyol(
            getenv('TRENDYOL_USER'),
            getenv('TRENDYOL_PASS'),
            getenv('TRENDYOL_SUPPLIER_ID'),
        );
    }

    protected function getTestProduct()
    {
        $product = new Product();
        $product->barcode = Str::random(8);
        $product->title = 'Bebek Takımı Pamuk';
        $product->productMainId = '1234BT';
        $product->brandId = 1791;
        $product->categoryId = 411;
        $product->quantity = 100;
        $product->stockCode = 'STK-345';
        $product->dimensionalWeight = 2;
        $product->description = 'Ürün açıklama bilgisi';
        $product->currencyType = 'TRY';
        $product->listPrice = 250.99;
        $product->salePrice = 120.99;
        $product->vatRate = 18;
        $product->cargoCompanyId = 10;
        $product->shipmentAddressId = 0;
        $product->returningAddressId = 0;
        $product->images = [
            [
                'url' => 'https://www.sampleadress/path/folder/image_1.jpg',
            ],
        ];
        $product->attributes = [
            [
                'attributeId'      => 338,
                'attributeValueId' => 6980,
            ],
            [
                'attributeId'      => 343,
                'attributeValueId' => 4294,
            ],
            [
                'attributeId'      => 346,
                'attributeValueId' => 4290,
            ],
        ];

        return $product;
    }

    protected function getTestProduct1Variation()
    {
        $product = new Product();
        $product->barcode = 'barkod-12345';
        $product->title = 'Bebek Takımı Pamuk';
        $product->productMainId = '1234BT';
        $product->brandId = 1791;
        $product->categoryId = 411;
        $product->quantity = 100;
        $product->stockCode = 'STK-3454';
        $product->dimensionalWeight = 2;
        $product->description = 'Ürün açıklama bilgisi';
        $product->currencyType = 'TRY';
        $product->listPrice = 250.99;
        $product->salePrice = 120.99;
        $product->vatRate = 18;
        $product->cargoCompanyId = 10;
        $product->shipmentAddressId = 0;
        $product->returningAddressId = 0;
        $product->images = [
            [
                'url' => 'https://www.sampleadress/path/folder/image_2.jpg',
            ],
        ];
        $product->attributes = [
            [
                'attributeId'      => 338,
                'attributeValueId' => 6981,
            ],
            [
                'attributeId'      => 343,
                'attributeValueId' => 4294,
            ],
            [
                'attributeId'      => 346,
                'attributeValueId' => 4290,
            ],
        ];

        return $product;
    }
}
