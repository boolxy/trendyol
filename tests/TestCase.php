<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Trendyol;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Main Class
     *
     * @var Trendyol
     */
    protected Trendyol $trendyol;

    /**
     * Setup
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->trendyol = new Trendyol(
            getenv("TRENDYOL_USER"),
            getenv("TRENDYOL_PASS"),
            getenv("TRENDYOL_SUPPLIER_ID"),
        );
    }
}
