<?php

namespace Boolxy\Trendyol\Tests;

use Boolxy\Trendyol\Enums\SettlementDateType;

class SettlementServiceTest extends TestCase
{
    /** @test */
    public function testGetSettlements()
    {
        $results = $this->trendyol->settlementService()->gettingSettlements()
            ->dateType(SettlementDateType::create(SettlementDateType::ORDER))
            ->startDate(1557469159834)
            ->endDate(1557469159834)
            ->get();

        $this->assertIsObject($results);
        $this->assertObjectHasAttribute('totalElements', $results);
        $this->assertObjectHasAttribute('totalPages', $results);
        $this->assertObjectHasAttribute('page', $results);
        $this->assertObjectHasAttribute('size', $results);
        $this->assertObjectHasAttribute('content', $results);
    }
}
