<?php

namespace BoolXY\Trendyol\Interfaces;

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
     * @param array $queryParams
     */
    public function __construct(array $data = [], array $queryParams = []);

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

    /**
     * @param array $data
     * @return IRequest
     */
    public function setData(array $data): IRequest;

    /**
     * Returns the data
     * @return array
     */
    public function getQueryParams(): array;

    /**
     * @param array $queryParams
     * @return IRequest
     */
    public function setQueryParams(array $queryParams): IRequest;
}
