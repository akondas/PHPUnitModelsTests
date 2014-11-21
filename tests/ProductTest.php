<?php

class ProductTest extends PHPUnit_Framework_TestCase
{

    public function testGetPrice()
    {
        $product = new Product(10, 0.23);

        $this->assertEquals($product->getPrice(), 12.30);
    }

    public function testGetPriceWithNullTaxRate()
    {
        $product = new Product(10, null);

        $this->assertEquals($product->getPrice(), 10);
    }

} 