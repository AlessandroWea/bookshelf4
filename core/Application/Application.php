<?php

declare(strict_types=1);

namespace Malordo\Application;

use Malordo\Router\RouterInterface;

class Application
{
    private RouterInterface $router;
    private string $app_dirname;
    private array $routes;

    public function __construct(string $app_dirname ,RouterInterface $router)
    {
        $this->router = $router;
        $this->app_dirname = $app_dirname;
    }

    public function run()
    {
        //load constants
        $this->defineConstants();

        //load configs
        $this->routes = $this->loadConfigs();

        //pass routers to Router
        $this->router->dispatch($this->routes);
    }

    private function defineConstants()
    {
        define('APP_ROOT', $this->app_dirname);
        define('CONFIG_PATH', APP_ROOT . '/' . 'config');
        define('TEMPLATE_PATH', APP_ROOT . '/' . 'src/templates');
        define('CONTROLLER_PATH', APP_ROOT . '/' . 'src/controllers');
    }

    private function loadConfigs()
    {

    }

}