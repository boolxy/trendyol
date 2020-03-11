<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\Abstracts\AbstractService;
use BoolXY\Trendyol\Builders\GetSettlementsRequestBuilder;
use BoolXY\Trendyol\Interfaces\IService;

class SettlementService extends AbstractService implements IService
{
    /**
     * @return GetSettlementsRequestBuilder
     */
    public function gettingSettlements(): GetSettlementsRequestBuilder
    {
        return new GetSettlementsRequestBuilder($this->requestManager);
    }
}
