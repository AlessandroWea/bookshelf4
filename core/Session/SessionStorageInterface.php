<?php

declare(strict_types=1);

namespace Malordo\Session;

interface SessionStorageInterface
{
    public function setSession(string $key, $value) : void;

    public function setArraySession(string $key, $value) : void;

    public function getSession(string $key, $default = null);

    public function hasSession(string $key);

    public function deleteSession(string $key) : void;
}