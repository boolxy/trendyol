<?php

namespace Boolxy\Trendyol\Enums;

use Boolxy\Trendyol\Abstracts\AbstractEnum;
use Boolxy\Trendyol\Interfaces\IEnum;

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
