<?php

class UserTest extends PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }

    public function testPasswordHashing()
    {
        $hasher = Mockery::mock('Hash');
        $hasher->shouldReceive('generate')
            ->once()
            ->with(Mockery::type('string'))
            ->andReturn('hashed');

        $john = new User($hasher);
        $john->setPassword('secret');

        $this->assertEquals('hashed', $john->getPassword());
    }

}