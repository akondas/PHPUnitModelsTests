<?php

class User
{

    protected $password;

    protected $hasher;

    public function __construct(Hash $hasher)
    {
        $this->hasher = $hasher;
    }

    public function setPassword($password)
    {
        $this->password = $this->hasher->generate($password);
    }

    public function getPassword()
    {
        return $this->password;
    }

} 