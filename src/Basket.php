<?php

class Basket
{

    protected $value;

    protected $quantity;

    public function __construct($value, $quantity)
    {
        $this->value    = $value;
        $this->quantity = $quantity;
    }

    public function __toString()
    {
        return sprintf(
            'Produktów w koszyku: %s; o łącznej wartości %s zł',
            $this->quantity,
            $this->value
        );
    }

} 