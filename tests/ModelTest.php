<?php

namespace BoolXY\Trendyol\Tests;

use BoolXY\Trendyol\Models\Product;

class ModelTest extends TestCase
{
    /** @test */
    public function testProductCanBeJsonSerialized()
    {
        $json = $this->getTestProduct1()->toJson();

        $this->assertJson($json);
    }
}
