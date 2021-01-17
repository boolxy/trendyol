<?php

namespace Boolxy\Trendyol\Enums;

use Boolxy\Trendyol\Abstracts\AbstractEnum;
use Boolxy\Trendyol\Interfaces\IEnum;

class SettlementDateType extends AbstractEnum implements IEnum
{
    const ORDER = 'Order';

    const PERIOD = 'Period';

    const DELIVERY = 'Delivery';

    const PROCESS = 'Process';
}
