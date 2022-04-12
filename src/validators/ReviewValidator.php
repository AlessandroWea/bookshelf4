<?php

declare(strict_types=1);

namespace app\validators;

use Malordo\Validator\BaseValidator;

class ReviewValidator extends BaseValidator
{
    public static function rules() : array
    {
        return [
            'bookname' => ['string', 'required'],
            'authorname' => ['string', 'required'],
            'theme' => ['required', 'string'],
            'text' => ['required']
        ];
    }
}