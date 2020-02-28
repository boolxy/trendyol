<?php


namespace BoolXY\Trendyol\Models;

use BoolXY\Trendyol\Collections\ProductAttributeCollection;
use BoolXY\Trendyol\Collections\ProductImageCollection;

class Product
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

    private ProductImageCollection $images;

    private int $vatRate;

    private int $shipmentAddressId;

    private int $returningAddressId;

    private ProductAttributeCollection $attributes;

    /**
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode(string $barcode): void
    {
        $this->barcode = $barcode;
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
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     */
    public function setProductMainId(string $productMainId): void
    {
        $this->productMainId = $productMainId;
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
     */
    public function setBrandId(int $brandId): void
    {
        $this->brandId = $brandId;
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
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
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
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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
     */
    public function setStockCode(string $stockCode): void
    {
        $this->stockCode = $stockCode;
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
     */
    public function setDimensionalWeight(float $dimensionalWeight): void
    {
        $this->dimensionalWeight = $dimensionalWeight;
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
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
     */
    public function setCurrencyType(string $currencyType): void
    {
        $this->currencyType = $currencyType;
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
     */
    public function setListPrice(float $listPrice): void
    {
        $this->listPrice = $listPrice;
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
     */
    public function setSalePrice(float $salePrice): void
    {
        $this->salePrice = $salePrice;
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
     */
    public function setCargoCompanyId(int $cargoCompanyId): void
    {
        $this->cargoCompanyId = $cargoCompanyId;
    }

    /**
     * @return ProductImageCollection
     */
    public function getImages(): ProductImageCollection
    {
        return $this->images;
    }

    /**
     * @param ProductImageCollection $images
     */
    public function setImages(ProductImageCollection $images): void
    {
        $this->images = $images;
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
     */
    public function setVatRate(int $vatRate): void
    {
        $this->vatRate = $vatRate;
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
     */
    public function setShipmentAddressId(int $shipmentAddressId): void
    {
        $this->shipmentAddressId = $shipmentAddressId;
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
     */
    public function setReturningAddressId(int $returningAddressId): void
    {
        $this->returningAddressId = $returningAddressId;
    }

    /**
     * @return ProductAttributeCollection
     */
    public function getAttributes(): ProductAttributeCollection
    {
        return $this->attributes;
    }

    /**
     * @param ProductAttributeCollection $attributes
     */
    public function setAttributes(ProductAttributeCollection $attributes): void
    {
        $this->attributes = $attributes;
    }

}
