<?php

namespace BoolXY\Trendyol\Exceptions;

use BoolXY\Trendyol\Interfaces\IException;
use Throwable;

class InvalidArgumentException extends \InvalidArgumentException implements IException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
