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
            'username' => ['required'],
            'password1' => ['required', 'range' => [4,10], 'equal' => ['password2']],
            'password2' => ['required', 'equal' => ['password1']],
        ];
    }
}