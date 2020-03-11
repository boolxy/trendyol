<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Enums\ClaimItemStatus;

class ClaimServiceTest extends TestCase
{
    /** @test */
    public function testGetClaims()
    {
        $results = $this->trendyol->claimService()->gettingClaims()
            ->status(ClaimItemStatus::create(ClaimItemStatus::CREATED))
            ->get();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute("totalElements", $results);
        $this->assertObjectHasAttribute("totalPages", $results);
        $this->assertObjectHasAttribute("page", $results);
        $this->assertObjectHasAttribute("size", $results);
        $this->assertObjectHasAttribute("content", $results);
    }

    /** @test */
    public function testApproveClaimLineItems()
    {
        $request = $this->trendyol->claimService()->approvingClaimLineItems()
            ->addClaimItemId("f9da2317-876b-4b86-b8f7-0535c3b65731")
            ->getRequest();

        $this->assertEquals([
            "claimLineItemIdList" => [
                "f9da2317-876b-4b86-b8f7-0535c3b65731"
            ],
            "params" => []
        ], $request->getData());
    }
}
