<?php

namespace BoolXY\Trendyol\Enums;

use BoolXY\Trendyol\Abstracts\AbstractEnum;
use BoolXY\Trendyol\Interfaces\IEnum;

final class ShipmentStatus extends AbstractEnum implements IEnum
{
    const CREATED = 'Created';

    const PICKING = 'Picking';

    const INVOICED = 'Invoiced';

    const SHIPPED = 'Shipped';

    const CANCELLED = 'Cancelled';

    const DELIVERED = 'Delivered';

    const UN_DELIVERED = 'UnDelivered';

    const RETURNED = 'Returned';

    const REPACK = 'Repack';

    const UN_SUPPLIED = 'UnSupplied';
}
