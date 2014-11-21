<?php

class Validator
{

    protected $passes = false;

    protected $messages;

    public function make($attributes, $rules)
    {
        foreach ($rules as $field => $rule) {
            $ruleName = 'validate' . ucfirst($rule);
            if (method_exists($this, $ruleName) && isset($attributes[$field])) {
                $this->passes = $this->$ruleName($attributes[$field]);
            }
        }
        return $this;
    }

    public function validateRequired($value)
    {
        if (is_null($value)) {
            return false;
        } elseif (is_array($value) && count($value) == 0) {
            return false;
        } elseif (trim($value) === '') {
            return false;
        }

        return true;
    }

    public function messages()
    {
        return $this->messages;
    }

    public function passes()
    {
        return $this->passes;
    }

} 