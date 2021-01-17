<?php

namespace Boolxy\Trendyol\Interfaces;

interface IParameters extends ISerializable
{
    public function has(string $key): bool;

    public function get(string $key = null);
}
