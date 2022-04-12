<?php

declare(strict_types=1);

namespace app\utils;


class Auth
{
    public static function auth(array $user)
    {
        $_SESSION['user'] = $user;
    }

    public static function is(string $role)
    {
        if(isset($_SESSION['user']))
            return $_SESSION['user']['role'] === $role;

        return false;
    }

    public static function logged()
    {
        return isset($_SESSION['user']);
    }

    public static function getUser()
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public static function getUserId()
    {
        return isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
    }
    
    public static function logout()
    {
        unset($_SESSION['user']);
    }
}