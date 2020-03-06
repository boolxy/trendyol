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
    public function __construct(array $data = [], array $queryParams = [])
    {
        $this->data = $data;

        if (empty($queryParams) && $this->getMethod() === IRequest::METHOD_GET) {
            $this->queryParams = $data;
        } else {
            $this->queryParams = $queryParams;
        }
    }

    /**
     * @param array $data
     * @param array $queryParams
     * @return static
     */
    public static function create(array $data = [], array $queryParams = []): self
    {
        return new static($data, $queryParams);
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
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }


    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        if (empty($this->queryParams) && $this->getMethod() === IRequest::METHOD_GET) {
            $this->queryParams = $data;
        }

        return $this;
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
}
