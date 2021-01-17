<?php

namespace Boolxy\Trendyol\Enums;

use Boolxy\Trendyol\Abstracts\AbstractEnum;
use Boolxy\Trendyol\Interfaces\IEnum;

final class OrderByDirection extends AbstractEnum implements IEnum
{
    const ASC = 'ASC';

    const DESC = 'DESC';
}
