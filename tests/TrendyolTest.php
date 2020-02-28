<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Services\AccountingService;
use BoolXY\Trendyol\Services\CancelService;
use BoolXY\Trendyol\Services\OrderService;
use BoolXY\Trendyol\Trendyol;
use BoolXY\Trendyol\Services\ProductService;

class TrendyolTest extends TestCase
{
    /** @test */
    public function testTrendyolInstance()
    {
        $this->assertInstanceOf(Trendyol::class, $this->trendyol);
    }

    /** @test */
    public function testAccountingServiceInstance()
    {
        $service = $this->trendyol->accountingService();

        $this->assertInstanceOf(AccountingService::class, $service);
    }

    /** @test */
    public function testCancelServiceInstance()
    {
        $service = $this->trendyol->cancelService();

        $this->assertInstanceOf(CancelService::class, $service);
    }

    /** @test */
    public function testOrderServiceInstance()
    {
        $service = $this->trendyol->orderService();

        $this->assertInstanceOf(OrderService::class, $service);
    }

    /** @test */
    public function testProductServiceInstance()
    {
        $service = $this->trendyol->productService();

        $this->assertInstanceOf(ProductService::class, $service);
    }
}
