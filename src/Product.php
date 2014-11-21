<?php

class Product
{

    protected $tax;

    protected $price;

    public function __construct($price, $tax)
    {
        $this->price = $price;
        $this->tax   = $tax;
    }

    public function getPrice()
    {
        return round($this->price * ($this->tax + 1), 2);
    }

} 