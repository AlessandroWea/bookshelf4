<?php

declare(strict_types=1);

namespace Malordo\Session;

interface SessionInterface
{
    public function set(string $key, $value) : void;

    public function setArray(string $key, $value) : void;

    public function get(string $key, $default = null);

    public function has(string $key);

    public function delete(string $key) : void;

}