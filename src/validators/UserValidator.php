<?php

declare(strict_types=1);

namespace app\validators;

use Malordo\Validator\ValidatorInterface;

class UserValidator implements ValidatorInterface
{

    private static array $errors = [];

    public static function validate(array $data = []) : bool
    {
        self::$errors = [];
        
        if(!empty($data)) {
            if(isset($data['name']) && isset($data['age'])) {
                $name = $data['name'];
                $age = $data['age'];

                if($name === '' || strlen($name) < 2) {
                    self::$errors['name'] = 'Name length must be greater than 2';
                }
                if(!is_numeric($age)) {
                    self::$errors['age'] = 'Age must be an integer';
                }
            }
        }

        return empty(self::$errors);
    }

    public static function getErrors() : array
    {
        return self::$errors;
    }
}