<?php

namespace Boolxy\Trendyol;

use Boolxy\Trendyol\Services\ClaimService;
use Boolxy\Trendyol\Services\OrderService;
use Boolxy\Trendyol\Services\ProductService;
use Boolxy\Trendyol\Services\SettlementService;

class Trendyol
{
    private RequestManager $requestManager;

    /**
     * Trendyol constructor.
     *
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
     *
     * @return static
     */
    public static function create(string $user, string $pass, string $supplier_id)
    {
        return new static($user, $pass, $supplier_id);
    }

    /**
     * @return SettlementService
     */
    public function settlementService(): SettlementService
    {
        return new SettlementService($this->requestManager);
    }

    /**
     * @return ClaimService
     */
    public function claimService(): ClaimService
    {
        return new ClaimService($this->requestManager);
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
}
