<?php

namespace BoolXY\Trendyol\Models;

use BoolXY\Trendyol\Abstracts\AbstractModel;

class Product extends AbstractModel
{
    public string $barcode;

    public string $title;

    public string $productMainId;

    public int $brandId;

    public int $categoryId;

    public int $quantity;

    public string $stockCode;

    public float $dimensionalWeight;

    public string $description;

    public string $currencyType;

    public float $listPrice;

    public float $salePrice;

    public int $cargoCompanyId;

    public array $images;

    public int $vatRate;

    public ?int $shipmentAddressId = null;

    public ?int $returningAddressId = null;

    public array $attributes;

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            "barcode" => $this->barcode,
            "title" => $this->title,
            "productMainId" => $this->productMainId,
            "brandId" => $this->brandId,
            "categoryId" => $this->categoryId,
            "quantity" => $this->quantity,
            "stockCode" => $this->stockCode,
            "dimensionalWeight" => $this->dimensionalWeight,
            "description" => $this->description,
            "currencyType" => $this->currencyType,
            "listPrice" => $this->listPrice,
            "salePrice" => $this->salePrice,
            "cargoCompanyId" => $this->cargoCompanyId,
            "images" => $this->images,
            "vatRate" => $this->vatRate,
            "shipmentAddressId" => $this->shipmentAddressId,
            "returningAddressId" => $this->returningAddressId,
            "attributes" => $this->attributes,
        ];
    }
}
