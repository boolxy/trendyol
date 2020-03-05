<?php

namespace BoolXY\Trendyol\Parameters;

use BoolXY\Trendyol\AbstractParameters;
use BoolXY\Trendyol\IParameters;

class UpdatePriceAndInventoryParameters extends AbstractParameters implements IParameters
{
    /**
     * @param string $barcode
     * @param int $quantity
     * @param float $salePrice
     * @param float $listPrice
     * @return UpdatePriceAndInventoryParameters
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
}
