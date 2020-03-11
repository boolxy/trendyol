<?php

namespace BoolXY\Trendyol\Enums;

use BoolXY\Trendyol\Abstracts\AbstractEnum;
use BoolXY\Trendyol\Interfaces\IEnum;

class SettlementDateType extends AbstractEnum implements IEnum
{
    const ORDER = 'Order';

    const PERIOD = 'Period';

    const DELIVERY = 'Delivery';

    const PROCESS = 'Process';
}
