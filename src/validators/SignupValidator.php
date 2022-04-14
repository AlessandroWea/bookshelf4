<?php

namespace app\validators;

use app\models\User;
use Malordo\Validator\Validator;

class SignupValidator extends Validator
{
    public static function validate(array $data) : bool
    {
        self::$errors = [];

        if(empty($data['email']))
            self::$errors['email'] = 'Email is required';
        else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
            self::$errors['email'] = 'Email is invalid';
        else if(User::findByEmail($data['email']))
            self::$errors['email'] = 'Email is taken already';
        
        if(empty($data['username']))
            self::$errors['username'] = 'Username is required';
        else if(strlen($data['username']) < 3)
            self::$errors['username'] = 'Username must contain 3 or more characters';
        else if(User::findByUsername($data['username']))
            self::$errors['username'] = 'Username is taken already';
        
        if(empty($data['password1']))
            self::$errors['password1'] = 'Password is required';
        else if($data['password1'] != $data['password2']){
            self::$errors['password1'] = 'Passwords dont match';
            self::$errors['password2'] = 'Passwords dont match';
        }

        return empty(self::$errors);
    }
}