<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Enums\ClaimItemStatus;

class ClaimServiceTest extends TestCase
{
    /** @test */
    public function testGetClaims()
    {
        $results = $this->trendyol->claimService()->getClaims()
            ->status(ClaimItemStatus::create(ClaimItemStatus::CREATED))
            ->get();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("totalElements", $results);
        $this->assertObjectHasAttribute("totalPages", $results);
        $this->assertObjectHasAttribute("page", $results);
        $this->assertObjectHasAttribute("size", $results);
        $this->assertObjectHasAttribute("content", $results);
    }
}
