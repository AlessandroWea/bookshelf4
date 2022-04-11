<?php

declare(strict_types=1);

namespace app\validators;

use Malordo\Validator\BaseValidator;

class UserValidator extends BaseValidator
{
    public static function rules() : array
    {
        return [
            'email' => ['string', 'required'],
            'password' => ['required', 'range' => [4,10]],
        ];
    }
}