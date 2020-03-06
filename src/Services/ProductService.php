<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\Abstracts\AbstractService;
use BoolXY\Trendyol\Builders\GetProductsRequestBuilder;
use BoolXY\Trendyol\Builders\UpdatePriceAndInventoryRequestBuilder;
use BoolXY\Trendyol\Interfaces\IParameters;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\Interfaces\IService;
use BoolXY\Trendyol\ParameterFactory;
use BoolXY\Trendyol\Parameters\CreateProductsParameters;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\ProductService\CreateProducts;
use BoolXY\Trendyol\Requests\ProductService\GetAttributes;
use BoolXY\Trendyol\Requests\ProductService\GetBatchRequestResult;
use BoolXY\Trendyol\Requests\ProductService\GetBrands;
use BoolXY\Trendyol\Requests\ProductService\GetBrandsByName;
use BoolXY\Trendyol\Requests\ProductService\GetCategories;
use BoolXY\Trendyol\Requests\ProductService\GetProducts;
use BoolXY\Trendyol\Requests\ProductService\GetProviders;
use BoolXY\Trendyol\Requests\ProductService\GetSuppliersAddresses;
use BoolXY\Trendyol\Requests\ProductService\UpdatePriceAndInventory;

class ProductService extends AbstractService implements IService
{
    /**
     * Get brands
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getBrands(int $page = 1, int $size = 10)
    {
        $request = GetBrands::create([
            "page" => $page,
            "size" => $size,
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * Get brands by name
     * @param string $name
     * @return mixed
     */
    public function getBrandsByName(string $name)
    {
        $request = GetBrandsByName::create([
            "name" => $name,
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * Get categories
     * @return mixed
     */
    public function getCategories()
    {
        $request = GetCategories::create();

        return $this->requestManager->process($request);
    }

    /**
     * Get attributes by categoryId
     * @param int $categoryId
     * @return mixed
     */
    public function getAttributes(int $categoryId)
    {
        $request = GetAttributes::create([
            "categoryId" => $categoryId,
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * Get shipment providers
     * @return mixed
     */
    public function getProviders()
    {
        $request = GetProviders::create();

        return $this->requestManager->process($request);
    }

    /**
     * Get suppliers addresses
     * @return mixed
     */
    public function getSuppliersAddresses()
    {
        $supplierId = $this->requestManager->getClient()->getSupplierId();
        $request = GetSuppliersAddresses::create([
            "supplierId" => $supplierId,
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * Get batch request result
     * for queues like product creation or updating price and inventory
     * @param string $batchRequestId
     * @return mixed
     */
    public function getBatchRequestResult(string $batchRequestId)
    {
        $supplierId = $this->requestManager->getClient()->getSupplierId();
        $request = GetBatchRequestResult::create([
            "supplierId" => $supplierId,
            "batchRequestId" => $batchRequestId,
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        $request = GetProducts::create([
            "supplierId" => $this->requestManager->getClient()->getSupplierId(),
        ]);

        return $this->requestManager->process($request);
    }

    /**
     * @return GetProductsRequestBuilder
     */
    public function gettingProducts(): GetProductsRequestBuilder
    {
        return new GetProductsRequestBuilder($this->requestManager);
    }

    /**
     * @return UpdatePriceAndInventoryRequestBuilder
     */
    public function updatingPriceAndInventory(): UpdatePriceAndInventoryRequestBuilder
    {
        return new UpdatePriceAndInventoryRequestBuilder($this->requestManager);
    }

//    public function createProducts(IParameters $parameters = null)
//    {
//        if (is_null($parameters)) {
//            $parameters = ParameterFactory::createProductsParameters();
//        }
//
//        if (!$parameters->has('supplierId')) {
//            $supplierId = $this->requestManager->getClient()->getSupplierId();
//            $parameters->supplierId($supplierId);
//        }
//
//        var_dump($parameters->get());
//
//        $request = CreateProducts::create($parameters->get());
//
//        return $this->requestManager->process($request);
//    }
}
