<?php

declare(strict_types=1);

namespace Malordo\Application;

use Symfony\Component\Yaml\Yaml;

class Config
{
    private static $routes = [];
    private static $dbCredentials = [];
    
    public static function loadConfigs()
    {
        $routesPath = CONFIG_PATH . 'routes.yaml';
        $dbCredentialsPath = CONFIG_PATH . 'db.yaml';

        if(!file_exists($routesPath))
            throw new \Exception("File $routesPath doesn't exist");
        if(!file_exists($dbCredentialsPath))
            throw new \Exception("File $dbCredentialsPath doesn't exist");

        self::$routes = Yaml::parseFile($routesPath);
        self::$dbCredentials = Yaml::parseFile($dbCredentialsPath);
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getDbCredentials()
    {
        return self::$dbCredentials;
    }
}