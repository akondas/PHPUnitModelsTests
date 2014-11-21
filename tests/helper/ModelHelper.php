<?php

trait ModelHelper
{

    public function assertIsValid($model)
    {
        $this->assertTrue(
            $model->isValid(),
            'Validation should succeed but failed'
        );
    }

    public function assertIsNotValid($model)
    {
        $this->assertFalse(
            $model->isValid(),
            'Validation should failed but succeed'
        );
    }

}