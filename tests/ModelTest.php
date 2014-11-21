<?php

class ModelTest extends PHPUnit_Framework_TestCase
{

    protected $model;

    protected $rules = ['title' => 'required'];

    public function setUp()
    {
        parent::setUp();

        $this->model = $model = new Model;
        $model->setRules($this->rules);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testReturnsTrueIfIsValid()
    {
        $validator = Mockery::mock('Validator');
        $validator->shouldReceive('make')
            ->once()
            ->with(['title' => 'Sample Title'], $this->rules)
            ->andReturn(Mockery::mock(['passes' => true]));
        $this->model->setValidator($validator);
        $this->model->title = 'Sample Title';

        $this->assertTrue($this->model->isValid());
    }

    public function testSetErrorsIfIsNotValid()
    {
        $validator = Mockery::mock('Validator');
        $validator->shouldReceive('make')
            ->once()
            ->with([], $this->rules)
            ->andReturn(Mockery::mock(['passes' => false, 'messages' => 'errors']));
        $this->model->setValidator($validator);
        $result = $this->model->isValid();

        $this->assertFalse($result);
        $this->assertEquals('errors', $this->model->getErrors());
    }
}