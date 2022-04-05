<?php

declare(strict_types=1);

namespace Malordo\Router;


class Router implements RouterInterface
{
    private array $routes;

    public function __construct($routes = [])
    {
        echo '<br>Router is activated';
    }

    public function dispatch() : void
    {

    }
}