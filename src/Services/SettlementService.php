<?php

namespace Boolxy\Trendyol\Services;

use Boolxy\Trendyol\Abstracts\AbstractService;
use Boolxy\Trendyol\Builders\GetSettlementsRequestBuilder;
use Boolxy\Trendyol\Interfaces\IService;

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
