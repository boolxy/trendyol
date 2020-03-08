<?php

namespace BoolXY\Trendyol\Tests;

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
}
