<?php

namespace BoolXY\Trendyol\Abstracts;

class AbstractEnum
{
    protected string $value;

    /**
     * AbstractEnum constructor.
     * @param string $choice
     */
    public function __construct(string $choice)
    {
        $this->value = $choice;
    }

    /**
     * @param $choice
     * @return static
     */
    public static function create($choice): self
    {
        return new static($choice);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string) $this->getValue();
    }
}
