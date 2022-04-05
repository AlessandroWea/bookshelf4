<?php

declare(strict_types=1);

namespace Malordo\Application;

use Malordo\Router\RouterInterface;
use Symfony\Component\Yaml\Yaml;

class Application
{
    private RouterInterface $router;
    private string $app_dirname;
    private array $routes;

    public function __construct(string $app_dirname, RouterInterface $router)
    {
        $this->router = $router;
        $this->app_dirname = $app_dirname;
    }

    public function run()
    {
        //load constants
        $this->defineConstants();

        //starting session
        $this->startSession();

        //load configs
        $this->routes = $this->loadRoutes();

        //pass routers to Router
        $this->router->dispatch($this->routes);
    }

    private function startSession()
    {
        session_start();
    }

    private function defineConstants()
    {
        define('APP_ROOT', $this->app_dirname);

        define('CONFIG_PATH', APP_ROOT . '/' . 'config/');
        define('TEMPLATE_PATH', APP_ROOT . '/' . 'src/templates/');
        define('CONTROLLER_PATH', APP_ROOT . '/' . 'src/controllers/');
        
        define('CONTROLLER_NAMESPACE', 'app\\controllers\\');

        define('CSS_PATH', APP_ROOT . '/' . 'public/js/');
        define('JS_PATH', APP_ROOT . '/' . 'public/js');
        define('IMG_PATH', APP_ROOT . '/' . 'public/img');
    }

    private function loadRoutes() : array
    {
        if(!file_exists(CONFIG_PATH . 'routes.yaml'))
            throw new \Exception('File doesnt exist');
        return Yaml::parseFile(CONFIG_PATH . 'routes.yaml');
    }

}