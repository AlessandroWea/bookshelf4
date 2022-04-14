<?php

namespace app\validators;

use Malordo\Validator\Validator;

class AddingReviewValidator extends Validator
{
    public static function validate(array $data) : bool
    {
        self::$errors = [];

        //here goes validation

        return true;
    }
}