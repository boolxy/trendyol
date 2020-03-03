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
     * Returns the method
     * @return string
     */
    public function getMethod(): string;

    /**
     * Returns the path
     * @return string
     */
    public function getPath(): string;

    /**
     * Returns the path pattern
     * @return string
     */
    public function getPathPattern(): string;

    /**
     * Returns the data
     * @return array
     */
    public function getData(): array;
}
