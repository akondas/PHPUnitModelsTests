<?php

class PageTest extends PHPUnit_Framework_TestCase
{

    use ModelHelper;

    protected $model;

    public function testIsValidWithTitle()
    {
        $page = new Page();
        $page->setValidator(new Validator());
        $page->title = 'Lorem Ipsum';

        $this->assertIsValid($page);
    }

    public function testIsInValidWithoutTitle()
    {
        $page = new Page();
        $page->setValidator(new Validator());

        $this->assertIsNotValid($page);
    }

} 