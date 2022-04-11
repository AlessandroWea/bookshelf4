<?php

declare(strict_types=1);

namespace Malordo\Validator;

interface ValidatorInterface
{
    public static function validate(array $data) : array;

    public static function getErrors() : array;

    public static function rules() : array;
}