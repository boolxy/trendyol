<?php

namespace BoolXY\Trendyol\Parameters;

use BoolXY\Trendyol\AbstractParameters;
use BoolXY\Trendyol\IParameters;

class ProductParameters extends AbstractParameters implements IParameters
{
    /**
     * @param bool $is
     * @return $this
     */
    public function approved(bool $is): self
    {
        $this->data["approved"] = $is ? "true" : "false";

        return $this;
    }

    /**
     * @param string $barcode
     * @return $this
     */
    public function barcode(string $barcode): self
    {
        $this->data["barcode"] = $barcode;

        return $this;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function startDate(int $timestamp): self
    {
        $this->data["startDate"] = $timestamp;

        return $this;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function endDate(int $timestamp): self
    {
        $this->data["endDate"] = $timestamp;

        return $this;
    }

    /**
     * @param int $pageNumber
     * @return $this
     */
    public function page(int $pageNumber): self
    {
        $this->data["page"] = $pageNumber;

        return $this;
    }

    /**
     * @param string $dataQueryType
     * @return $this
     */
    public function dataQueryType(string $dataQueryType): self
    {
        $this->data["dataQueryType"] = (string) $dataQueryType;

        return $this;
    }

    /**
     * @param int $size
     * @return $this
     */
    public function size(int $size): self
    {
        $this->data["size"] = $size;

        return $this;
    }

    /**
     * @param int $supplierId
     * @return $this
     */
    public function supplierId(int $supplierId): self
    {
        $this->data["supplierId"] = $supplierId;

        return $this;
    }
}
