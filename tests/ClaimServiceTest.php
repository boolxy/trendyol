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

    /** @test */
    public function testGetClaimsIssueReasons()
    {
        $results = $this->trendyol->claimService()->getClaimsIssueReasons();

        $this->assertIsArray($results);
        $this->assertGreaterThan(0, count($results));
    }

    /** @test */
    public function testCreateClaimIssue()
    {
        $request = $this->trendyol->claimService()->creatingClaimIssue()
            ->setClaimIssueReasonId(1)
            ->setClaimId("f9da2317-876b-4b86-b8f7-0535c3b65731")
            ->setClaimItemIdList("b71461e3-d1a0-4c1d-9a6d-18ecbcb5158c")
            ->addFile(__DIR__ . '/test.png')
            ->getRequest();

        $this->assertEquals([
            "claimIssueReasonId" => 1,
            "claimId" => "f9da2317-876b-4b86-b8f7-0535c3b65731",
            "claimItemIdList" => "b71461e3-d1a0-4c1d-9a6d-18ecbcb5158c",
        ], $request->getQueryParams());
        $this->assertArrayHasKey("name", $request->getMultipart()[0]);
        $this->assertArrayHasKey("contents", $request->getMultipart()[0]);
    }
}
