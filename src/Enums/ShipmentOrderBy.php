<?php

namespace BoolXY\Trendyol\Enums;

use BoolXY\Trendyol\Abstracts\AbstractEnum;
use BoolXY\Trendyol\Interfaces\IEnum;

final class ShipmentOrderBy extends AbstractEnum implements IEnum
{
    const PACKAGE_LAST_MODIFIED_DATE = 'PackageLastModifiedDate';

    const CREATED_DATE = 'CreatedDate';
}
