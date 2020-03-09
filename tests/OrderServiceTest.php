<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Enums\ShipmentStatus;

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
        $results = $this->trendyol->orderService()
            ->updateTrackingNumber(11650604, "7340447182689");
    }

    /** @test */
    public function testUpdatingPackage()
    {
        $results = $this->trendyol->orderService()
            ->updatingPackage()
            ->setPackageId(11650604)
            ->addLine(56040534, 3)
            ->addParam("invoiceNumber", "EME2018000025208")
            ->setStatus(ShipmentStatus::create(ShipmentStatus::INVOICED))
            ->update();
    }

    /** @test */
    public function testSendInvoiceLink()
    {
        $results = $this->trendyol->orderService()->sendInvoiceLink(
            "https://extfatura.faturaentegratoru.com/324523-34523-52345-3453245.pdf",
            435346,
        );
    }
}
