<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\Requests\ProductService\UpdatePriceAndInventory;

class UpdatePriceAndInventoryRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * @return UpdatePriceAndInventory
     */
    protected function getRequest(): UpdatePriceAndInventory
    {
        return UpdatePriceAndInventory::create()
            ->setQueryParams([
                "supplierId" => $this->requestManager->getClient()->getSupplierId(),
            ]);
    }

    /**
     * @param string $barcode
     * @param int $quantity
     * @param float $salePrice
     * @param float $listPrice
     * @return UpdatePriceAndInventoryRequestBuilder
     */
    public function addItem(string $barcode, int $quantity, float $salePrice, float $listPrice)
    {
        $this->data["items"][] = [
            "barcode" => $barcode,
            "quantity" => $quantity,
            "salePrice" => $salePrice,
            "listPrice" => $listPrice,
        ];

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
