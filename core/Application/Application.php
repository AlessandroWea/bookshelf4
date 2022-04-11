<?php

declare(strict_types=1);

namespace Malordo\Application;

use Malordo\Router\RouterInterface;

class Application
{
    private RouterInterface $router;
    private string $app_dirname;

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
        $this->loadConfigs();
        
        //pass routers to Router
        $this->router->dispatch(Config::getRoutes());
    }

    private function startSession()
    {
        session_start();
        $_SESSION['role'] = 'anon';
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

    private function loadConfigs() : void
    {
        Config::loadConfigs();
    }

}