<?php

declare(strict_types=1);

namespace app\utils;


class Auth
{
    public static function auth(string $role)
    {
        $_SESSION['role'] = $role;
    }

    public static function is(string $role)
    {
        return $_SESSION['role'] === $role;
    }

}