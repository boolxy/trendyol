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
     *
     * @param array $data
     * @param array $queryParams
     */
    public function __construct(array $queryParams = [], array $data = []);

    /**
     * Returns the method.
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Returns the path.
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Returns the path pattern.
     *
     * @return string
     */
    public function getPathPattern(): string;

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getData(string $key = '');

    /**
     * @param array $data
     *
     * @return IRequest
     */
    public function setData(array $data): self;

    /**
     * Returns the data.
     *
     * @return array
     */
    public function getQueryParams(): array;

    /**
     * @param array $queryParams
     *
     * @return IRequest
     */
    public function setQueryParams(array $queryParams): self;

    /**
     * @param string $key
     * @param $value
     * @param bool $isNew
     *
     * @return IRequest
     */
    public function addData(string $key, $value, bool $isNew = false): self;

    /**
     * @param string $key
     * @param $value
     *
     * @return IRequest
     */
    public function addQueryParam(string $key, $value): self;

    /**
     * @param array $item
     *
     * @return $this
     */
    public function addMultipart(array $item): self;

    /**
     * @return array
     */
    public function getMultipart(): array;
}
