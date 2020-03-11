<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Enums\ShipmentStatus;
use BoolXY\Trendyol\Requests\OrderService\SendInvoiceLink;
use BoolXY\Trendyol\Requests\OrderService\UpdateTrackingNumber;

class OrderServiceTest extends TestCase
{
    /** @test */
    public function testGetShipmentPackages()
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
        $request = UpdateTrackingNumber::create([
            "supplierId" => 12345,
            "shipmentPackageId" => 11650604,
        ], [
            "trackingNumber" => 7340447182689,
        ]);

        $this->assertEquals([ "trackingNumber" => 7340447182689 ], $request->getData());
        $this->assertEquals([
            "supplierId" => 12345,
            "shipmentPackageId" => 11650604,
        ], $request->getQueryParams());
    }

    /** @test */
    public function testUpdatePackage()
    {
        $request = $this->trendyol->orderService()
            ->updatingPackage()
            ->setPackageId(11650604)
            ->addLine(56040534, 3)
            ->addParam("invoiceNumber", "EME2018000025208")
            ->setStatus(ShipmentStatus::create(ShipmentStatus::INVOICED))
            ->getRequest();

        $this->assertEquals([
            "lines" => [
                [
                    "lineId" => 56040534,
                    "quantity" => 3,
                ]
            ],
            "params" => [
                "invoiceNumber" => "EME2018000025208"
            ],
            "status" => "Invoiced"
        ], $request->getData());
        $this->assertEquals("suppliers/120874/shipment-packages/11650604", $request->getPath());
    }

    /** @test */
    public function testSendInvoiceLink()
    {
        $request = SendInvoiceLink::create([
            "supplierId" => 12345,
        ])
            ->addData("invoiceLink", "https://extfatura.faturaentegratoru.com/324523-34523-52345-3453245.pdf")
            ->addData("shipmentPackageId", 435346);

        $this->assertEquals("suppliers/12345/supplier-invoice-links", $request->getPath());
        $this->assertEquals([
            "invoiceLink" => "https://extfatura.faturaentegratoru.com/324523-34523-52345-3453245.pdf",
            "shipmentPackageId" => 435346,
        ], $request->getData());
        $this->assertEquals([
            "supplierId" => 12345,
        ], $request->getQueryParams());
    }

    /** @test */
    public function testSplitShipmentPackage()
    {
        $request = $this->trendyol->orderService()->splittingShipmentPackage()
            ->setShipmentPackageId(11650604)
            ->addOrderLineId(2)
            ->addOrderLineId(3)
            ->addOrderLineId(4)
            ->getRequest();

        $this->assertEquals([
            "supplierId" => 120874,
            "shipmentPackageId" => 11650604,
        ], $request->getQueryParams());
        $this->assertEquals([
            "orderLineIds" => [ 2, 3, 4 ]
        ], $request->getData());
        $this->assertEquals("suppliers/120874/shipment-packages/11650604/split", $request->getPath());
    }

    /** @test */
    public function testSplitShipmentPackageMulti()
    {
        $request = $this->trendyol->orderService()->splittingShipmentPackageMulti()
            ->setShipmentPackageId(11650604)
            ->addGroup([ 3, 5, 6 ])
            ->addGroup([ 7, 8, 9 ])
            ->getRequest();

        $this->assertEquals([
            "splitGroups" => [
                [
                    "orderLineIds" => [
                        3, 5, 6
                    ],
                ],
                [
                    "orderLineIds" => [
                        7, 8, 9
                    ],
                ]
            ],
        ], $request->getData());
        $this->assertEquals("suppliers/120874/shipment-packages/11650604/multi-split", $request->getPath());
    }

    /** @test */
    public function testSplitShipmentPackageByQuantity()
    {
        $request = $this->trendyol->orderService()->splittingShipmentPackageByQuantity()
            ->setShipmentPackageId(11650604)
            ->addQuantitySplit(0, [ 2, 2 ])
            ->getRequest();

        $this->assertEquals([
            "quantitySplit" => [
                [
                    "orderLineId" => 0,
                    "quantities" => [
                        2, 2
                    ],
                ],
            ],
        ], $request->getData());
        $this->assertEquals("suppliers/120874/shipment-packages/11650604/quantity-split", $request->getPath());
    }
}
