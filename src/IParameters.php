<?php

namespace BoolXY\Trendyol;

interface IParameters
{
    public function toArray(): array;

    public function has(string $key): bool;
}
