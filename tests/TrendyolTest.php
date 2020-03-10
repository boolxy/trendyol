<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Trendyol;
use BoolXY\Trendyol\Services\ProductService;
use BoolXY\Trendyol\Services\OrderService;
use BoolXY\Trendyol\Services\ClaimService;
use BoolXY\Trendyol\Services\SettlementService;

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
        $service = $this->trendyol->settlementService();

        $this->assertInstanceOf(SettlementService::class, $service);
    }

    /** @test */
    public function testCancelServiceInstance()
    {
        $service = $this->trendyol->claimService();

        $this->assertInstanceOf(ClaimService::class, $service);
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
