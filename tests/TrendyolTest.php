<?php

namespace Boolxy\Trendyol\Tests;

use Boolxy\Trendyol\Services\ClaimService;
use Boolxy\Trendyol\Services\OrderService;
use Boolxy\Trendyol\Services\ProductService;
use Boolxy\Trendyol\Services\SettlementService;
use Boolxy\Trendyol\Trendyol;

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
