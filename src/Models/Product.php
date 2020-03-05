<?php

namespace BoolXY\Trendyol\Models;

use BoolXY\Trendyol\AbstractModel;

class Product extends AbstractModel
{
    private string $barcode;

    private string $title;

    private string $productMainId;

    private int $brandId;

    private int $categoryId;

    private int $quantity;

    private string $stockCode;

    private float $dimensionalWeight;

    private string $description;

    private string $currencyType;

    private float $listPrice;

    private float $salePrice;

    private int $cargoCompanyId;

    private array $images;

    private int $vatRate;

    private ?int $shipmentAddressId = null;

    private ?int $returningAddressId = null;

    private array $attributes;

    public static function create()
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     * @return Product
     */
    public function setBarcode(string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductMainId(): string
    {
        return $this->productMainId;
    }

    /**
     * @param string $productMainId
     * @return Product
     */
    public function setProductMainId(string $productMainId): self
    {
        $this->productMainId = $productMainId;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     * @return Product
     */
    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     * @return Product
     */
    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Product
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return string
     */
    public function getStockCode(): string
    {
        return $this->stockCode;
    }

    /**
     * @param string $stockCode
     * @return Product
     */
    public function setStockCode(string $stockCode): self
    {
        $this->stockCode = $stockCode;

        return $this;
    }

    /**
     * @return float
     */
    public function getDimensionalWeight(): float
    {
        return $this->dimensionalWeight;
    }

    /**
     * @param float $dimensionalWeight
     * @return Product
     */
    public function setDimensionalWeight(float $dimensionalWeight): self
    {
        $this->dimensionalWeight = $dimensionalWeight;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }

    /**
     * @param string $currencyType
     * @return Product
     */
    public function setCurrencyType(string $currencyType): self
    {
        $this->currencyType = $currencyType;

        return $this;
    }

    /**
     * @return float
     */
    public function getListPrice(): float
    {
        return $this->listPrice;
    }

    /**
     * @param float $listPrice
     * @return Product
     */
    public function setListPrice(float $listPrice): self
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getSalePrice(): float
    {
        return $this->salePrice;
    }

    /**
     * @param float $salePrice
     * @return Product
     */
    public function setSalePrice(float $salePrice): self
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    /**
     * @return int
     */
    public function getCargoCompanyId(): int
    {
        return $this->cargoCompanyId;
    }

    /**
     * @param int $cargoCompanyId
     * @return Product
     */
    public function setCargoCompanyId(int $cargoCompanyId): self
    {
        $this->cargoCompanyId = $cargoCompanyId;

        return $this;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $image
     */
    public function addImage(array $image): void
    {
        $this->images[] = $image;
    }

    /**
     * @return int
     */
    public function getVatRate(): int
    {
        return $this->vatRate;
    }

    /**
     * @param int $vatRate
     * @return Product
     */
    public function setVatRate(int $vatRate): self
    {
        $this->vatRate = $vatRate;

        return $this;
    }

    /**
     * @return int
     */
    public function getShipmentAddressId(): int
    {
        return $this->shipmentAddressId;
    }

    /**
     * @param int $shipmentAddressId
     * @return Product
     */
    public function setShipmentAddressId(int $shipmentAddressId): self
    {
        $this->shipmentAddressId = $shipmentAddressId;

        return $this;
    }

    /**
     * @return int
     */
    public function getReturningAddressId(): int
    {
        return $this->returningAddressId;
    }

    /**
     * @param int $returningAddressId
     * @return Product
     */
    public function setReturningAddressId(int $returningAddressId): self
    {
        $this->returningAddressId = $returningAddressId;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attribute
     */
    public function addAttribute(array $attribute): void
    {
        $this->attributes[] = $attribute;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
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
