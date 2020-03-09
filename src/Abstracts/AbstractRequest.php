<?php

namespace BoolXY\Trendyol\Abstracts;

use BoolXY\Trendyol\Interfaces\IRequest;

abstract class AbstractRequest implements IRequest
{
    private array $data = [];

    private array $queryParams = [];

    /**
     * AbstractRequest constructor.
     * @param array $data
     * @param array $queryParams
     */
    public function __construct(array $queryParams = [], array $data = [])
    {
        $this->queryParams = $queryParams;

        $this->data = $data;
    }

    /**
     * @param array $data
     * @param array $queryParams
     * @return static
     */
    public static function create(array $queryParams = [], array $data = []): self
    {
        return new static($queryParams, $data);
    }

    /**
     * Returns the path after then replace the variables
     * @return string
     */
    public function getPath(): string
    {
        $path = $this->getPathPattern();
        $path = $this->replaceVariablesWithValues($path);
        $path = $this->removeNonSelectedVariables($path);

        return $path;
    }

    /**
     * @param string $path
     * @return string
     */
    private function replaceVariablesWithValues(string $path): string
    {
        $params = $this->getQueryParams();
        foreach (array_keys($params) as $key) {
            if (!is_array($params[$key])) {
                $path = preg_replace('/\$'.$key.'/', urlencode($params[$key]), $path);
            }
        }

        return $path;
    }

    /**
     * @param string $path
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
     * @param array $data
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getData(string $key = "")
    {
        if (empty($key))
        {
            return $this->data;
        }
        return $this->data[$key] ?? null;
    }

    /**
     * @param array $queryParams
     * @return $this
     */
    public function setQueryParams(array $queryParams): self
    {
        $this->queryParams = $queryParams;

        return $this;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * @param string $key
     * @param $value
     * @param bool $isNew
     * @return $this
     */
    public function addData(string $key, $value, bool $isNew = false): self
    {
        if (!$isNew) {
            $this->data[$key] = $value;
        } else {
            $this->data[$key][] = $value;
        }

        return $this;
    }

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function addQueryParam(string $key, $value): self
    {
        $this->queryParams[$key] = $value;

        return $this;
    }
}
