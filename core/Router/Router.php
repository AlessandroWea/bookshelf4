<?php

declare(strict_types=1);

namespace Malordo\Router;

use Malordo\Request\Request;

use ReflectionClass;

class Router implements RouterInterface
{
    public function __construct() {}

    private function transformControllerName(string $name)
    {
        return ucfirst($name . 'Controller');
    }

    private function transformActionName(string $name)
    {
        return 'action' . ucfirst($name);
    }

    public function dispatch(array $routes) : void
    {
        $uri = Request::getURI();
        try {
            foreach($routes as $uriPattern => $path){
                if(preg_match("#^$uriPattern$#", $uri)){

                    $internalRoute = preg_replace("#^$uriPattern$#", $path, $uri);
                    $segments = explode('/', $internalRoute);

                    //getting controller name and its action name
                    $controllerName = $this->transformControllerName(array_shift($segments));
                    $actionName = $this->transformActionName(array_shift($segments));

                    //building controller's name with namespace
                    $controllerFullName = CONTROLLER_NAMESPACE . $controllerName;

                    //get action method through classes' reflection
                    $reflection_object = new ReflectionClass($controllerFullName);
                    $method = $reflection_object->getMethod($actionName);

                    //invoke action with parameters left in $segments
                    $method->invokeArgs(new $controllerFullName, $segments);

                    return;
                }
            }
        } catch(\ReflectionException $e) {
            echo $e->getMessage();
            die;
        }

        echo '404 NOT FOUND';
    }
}