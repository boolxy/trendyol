<?php

namespace Boolxy\Trendyol\Enums;

use Boolxy\Trendyol\Abstracts\AbstractEnum;
use Boolxy\Trendyol\Interfaces\IEnum;

final class DataQueryType extends AbstractEnum implements IEnum
{
    const CREATED_DATE = 'CREATED_DATE';

    const LAST_MODIFIED_DATE = 'LAST_MODIFIED_DATE';
}
