<?php

namespace BoolXY\Trendyol\Enums;

use BoolXY\Trendyol\Abstracts\AbstractEnum;
use BoolXY\Trendyol\Interfaces\IEnum;

final class DataQueryType extends AbstractEnum implements IEnum
{
    const CREATED_DATE = 'CREATED_DATE';

    const LAST_MODIFIED_DATE = 'LAST_MODIFIED_DATE';
}
