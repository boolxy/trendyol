<?php

namespace BoolXY\Trendyol;

use BoolXY\Trendyol\Services\AccountingService;
use BoolXY\Trendyol\Services\CancelService;
use BoolXY\Trendyol\Services\OrderService;
use BoolXY\Trendyol\Services\ProductService;

class Trendyol
{
    private RequestManager $requestManager;

    /**
     * Trendyol constructor.
     * @param string $user
     * @param string $pass
     * @param string $supplier_id
     */
    public function __construct(string $user, string $pass, string $supplier_id)
    {
        $client = new Client($user, $pass, $supplier_id);

        $this->requestManager = new RequestManager($client);
    }

    /**
     * @param string $user
     * @param string $pass
     * @param string $supplier_id
     * @return static
     */
    public static function create(string $user, string $pass, string $supplier_id)
    {
        return new static($user, $pass, $supplier_id);
    }

    /**
     * @return AccountingService
     */
    public function accountingService(): AccountingService
    {
        return new AccountingService($this->requestManager);
    }

    /**
     * @return CancelService
     */
    public function cancelService(): CancelService
    {
        return new CancelService($this->requestManager);
    }

    /**
     * @return OrderService
     */
    public function orderService(): OrderService
    {
        return new OrderService($this->requestManager);
    }

    /**
     * @return ProductService
     */
    public function productService(): ProductService
    {
        return new ProductService($this->requestManager);
    }

    /**
     * @return ParameterBuilder
     */
    public static function parameterBuilder(): ParameterBuilder
    {
        return new ParameterBuilder();
    }
}
