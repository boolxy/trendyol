<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Enums\ShipmentStatus;
use BoolXY\Trendyol\Exceptions\EmptyResponseException;
use BoolXY\Trendyol\Exceptions\InvalidArgumentException;

class OrderServiceTest extends TestCase
{
    /** @test */
    public function testGettingShipmentPackages()
    {
        $results = $this->trendyol->orderService()->gettingShipmentPackages()->get();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("totalElements", $results);
        $this->assertObjectHasAttribute("totalPages", $results);
        $this->assertObjectHasAttribute("page", $results);
        $this->assertObjectHasAttribute("size", $results);
        $this->assertObjectHasAttribute("content", $results);
        $this->assertIsArray($results->content);
    }

    /** @test */
    public function testUpdateTrackingNumber()
    {
        try {
            $results = $this->trendyol->orderService()
                ->updateTrackingNumber(11650604, "7340447182689");
        } catch (InvalidArgumentException $exception) {
            $message = $exception->getMessage();

            $this->assertEquals(
                "Sipariş kargo paketi güncelleme için uygun statüye sahip değildir. Paket Id: 11650604",
                $message
            );
        }
    }

    /** @test */
    public function testUpdatingPackage()
    {
        try {
            $results = $this->trendyol->orderService()
                ->updatingPackage()
                ->setPackageId(11650604)
                ->addLine(56040534, 3)
                ->addParam("invoiceNumber", "EME2018000025208")
                ->setStatus(ShipmentStatus::create(ShipmentStatus::INVOICED))
                ->update();
        } catch (EmptyResponseException $exception) {
            $this->assertTrue(true);
        }
    }
}
