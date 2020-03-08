<?php

namespace BoolXY\Trendyol\Enums;

use BoolXY\Trendyol\Abstracts\AbstractEnum;
use BoolXY\Trendyol\Interfaces\IEnum;

class OrderByDirection extends AbstractEnum implements IEnum
{
    const ASC = 'ASC';

    const DESC = 'DESC';
}
