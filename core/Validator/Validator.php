<?php

namespace Malordo\Validator;

abstract class Validator
{
    protected static $errors = [];
    public static abstract function validate(array $data) : bool;

    public static function getErrors()
    {
        return static::$errors;
    }

}