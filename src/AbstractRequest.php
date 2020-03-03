<?php

namespace BoolXY\Trendyol;

abstract class AbstractRequest implements IRequest
{
    private array $data = [];

    /**
     * AbstractRequest constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function create(array $data = []): self
    {
        return new static($data);
    }

    /**
     * Returns the path after then replace the variables
     * @return string
     */
    public function getPath(): string
    {
        if ($this->getMethod() === self::METHOD_GET) {

            $pattern = $this->getPathPattern();
            $data = $this->getData();
            foreach (array_keys($data) as $key) {
                $pattern = preg_replace('/\$'.$key.'/', urlencode($data[$key]), $pattern);
            }

            return $pattern;
        }

        return $this->path;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}