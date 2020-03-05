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
        $path = $this->getPathPattern();
        if ($this->getMethod() === self::METHOD_GET) {
            $path = $this->replaceVariablesWithValues($path);
            $path = $this->removeNonSelectedVariables($path);
        }

        return $path;
    }

    /**
     * @return string
     */
    private function replaceVariablesWithValues(string $path): string
    {
        $data = $this->getData();
        foreach (array_keys($data) as $key) {
            $path = preg_replace('/\$'.$key.'/', urlencode($data[$key]), $path);
        }

        return $path;
    }

    /**
     * @param string $queryString
     * @return string
     */
    private function removeNonSelectedVariables(string $path): string
    {
        $path = preg_replace('/[a-z]+=\$[a-z]+/i', '', $path);
        $path = preg_replace('/&{2,}/i', '', $path);
        $path = rtrim($path, '?');

        return $path;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}