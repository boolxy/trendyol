<?php

namespace BoolXY\Trendyol;

interface IRequest
{
    const METHOD_GET = 'get';

    const METHOD_POST = 'post';

    const METHOD_PATCH = 'patch';

    const METHOD_PUT = 'put';

    const METHOD_DELETE = 'delete';

    /**
     * RequestInterface constructor.
     * @param array $data
     */
    public function __construct(array $data = []);

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @param string $method
     */
    public function setMethod(string $method): void;

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @param string $path
     */
    public function setPath(string $path): void;

    /**
     * @return array
     */
    public function getData(): array;

    /**
     * @param array $data
     * @return void
     */
    public function setData(array $data): void;
}