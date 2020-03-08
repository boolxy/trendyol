<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\Abstracts\AbstractService;
use BoolXY\Trendyol\Builders\GetShipmentPackagesRequestBuilder;
use BoolXY\Trendyol\Interfaces\IService;

class OrderService extends AbstractService implements IService
{
    public function gettingShipmentPackages(): GetShipmentPackagesRequestBuilder
    {
        return new GetShipmentPackagesRequestBuilder($this->requestManager);
    }
}
