<?php

declare(strict_types=1);

namespace Malordo\Session;

use Malordo\Session\SessionStorageInterface;

class NativeSessionStorage implements SessionStorageInterface
{
    public function setSession(string $key, $value) : void
    {
        $_SESSION[$key] = $value;
    }

    public function setArraySession(string $key, $value) : void
    {
        $_SESSION[$key][] = $value;
    }

    public function getSession(string $key, $default = null)
    {
        if($this->hasSession($key))
            return $_SESSION[$key];

        return $default;
    }

    public function hasSession(string $key)
    {
        return isset($_SESSION[$key]);
    }

    public function deleteSession(string $key) : void
    {
        if($this->hasSession($key))
            unset($_SESSION[$key]);
    }
}