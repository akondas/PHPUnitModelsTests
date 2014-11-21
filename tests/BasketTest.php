<?php

class BasketTest extends PHPUnit_Framework_TestCase
{

    public function testBasketToString()
    {
        $basket = new Basket(150, 3);

        $this->assertEquals('Produktów w koszyku: 3; o łącznej wartości 150 zł', $basket);
    }

} 