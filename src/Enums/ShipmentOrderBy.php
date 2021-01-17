<?php

namespace Boolxy\Trendyol\Enums;

use Boolxy\Trendyol\Abstracts\AbstractEnum;
use Boolxy\Trendyol\Interfaces\IEnum;

final class ShipmentOrderBy extends AbstractEnum implements IEnum
{
    const PACKAGE_LAST_MODIFIED_DATE = 'PackageLastModifiedDate';

    const CREATED_DATE = 'CreatedDate';
}
