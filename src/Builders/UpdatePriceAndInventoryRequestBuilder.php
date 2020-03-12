<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\ProductService\UpdatePriceAndInventory;

class UpdatePriceAndInventoryRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * UpdatePriceAndInventoryRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(UpdatePriceAndInventory::create([
            'supplierId' => $this->requestManager->getClient()->getSupplierId(),
        ]));
    }

    /**
     * @param string $barcode
     * @param int    $quantity
     * @param float  $salePrice
     * @param float  $listPrice
     *
     * @return UpdatePriceAndInventoryRequestBuilder
     */
    public function addItem(string $barcode, int $quantity, float $salePrice, float $listPrice)
    {
        $this->request->addData('items', [
            'barcode'   => $barcode,
            'quantity'  => $quantity,
            'salePrice' => $salePrice,
            'listPrice' => $listPrice,
        ], true);

        return $this;
    }

    /**
     * @return mixed
     */
    public function update()
    {
        return $this->process();
    }
}
