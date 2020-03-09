<?php

namespace BoolXY\Trendyol\Exceptions;

use BoolXY\Trendyol\Interfaces\IException;
use Throwable;

class InvalidArgumentException extends \InvalidArgumentException implements IException
{
}
