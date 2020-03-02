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
     * @return mixed
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getPath(): string
    {
        if ($this->getMethod() === self::METHOD_GET) {
            $path = [];

            $data = $this->getData();

            foreach (explode("/", $this->path) as $item) {
                if (substr($item, 0, 1) === '$') {
                    $param = substr($item, 1);
                    if (array_key_exists($param, $data)) {
                        $path[] = $data[$param];
                    }
                } else {
                    $path[] = $item;
                }
            }

            return join('/', $path);
        }

        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}