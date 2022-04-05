<?php

declare(strict_types=1);

namespace Malordo\Router;

interface RouterInterface
{
    public function dispatch(array $routes) : void;
}