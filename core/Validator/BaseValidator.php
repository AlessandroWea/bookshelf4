<?php

declare(strict_types=1);

namespace Malordo\Validator;

use Malordo\Validator\ValidatorInterface;

class BaseValidator implements ValidatorInterface
{

    protected static array $errors = [];

    public static function validate(array $data) : array
    {
        $rules = static::rules();
        $errors = [];
        foreach($data as $item => $value){

            $current_rules = $rules[$item];
            foreach($current_rules as $rule_index => $rule){
                if($rule == 'string'){
                    if(!is_string($value)){
                        $errors[$item][] = "The field must be string";
                    }
                }
                else if($rule == 'required'){
                    if(empty($value)){
                        $errors[$item][] = "The field is required";
                    }
                }
                else if(is_array($rule) && $rule_index == 'range'){
                    if(strlen($value) < $rule[0] || strlen($value) > $rule[1]){
                        $errors[$item][] = "The field must be in range $rule[0] - $rule[1]";
                    }
                }
            }
        }

        return $errors;
    }

    public static function getErrors() : array
    {
        return self::$errors;
    }

    public static function rules() : array
    {
        return [

        ];
    }
}

    // public static function validate(array $data = []) : bool
    // {
    //     self::$errors = [];
        
    //     if(!empty($data)) {
    //         if(isset($data['name']) && isset($data['age'])) {
    //             $name = $data['name'];
    //             $age = $data['age'];

    //             if($name === '' || strlen($name) < 2) {
    //                 self::$errors['name'] = 'Name length must be greater than 2';
    //             }
    //             if(!is_numeric($age)) {
    //                 self::$errors['age'] = 'Age must be an integer';
    //             }
    //         }
    //     }

    //     return empty(self::$errors);
    // }