<?php

class Model
{

    protected $errors;

    protected $validator;

    protected $rules;

    protected $attributes = [];

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid()
    {
        $validation = $this->validator->make($this->attributes, $this->rules);
        if ($validation->passes())
            return true;

        $this->errors = $validation->messages();

        return false;
    }

} 