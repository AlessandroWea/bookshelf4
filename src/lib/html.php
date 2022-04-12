<?php

use app\utils\Auth;

function render(string $filename, array $args = [])
{
    $path = TEMPLATE_PATH . $filename;
    if(is_file($path)){
        if($args) extract($args);
        ob_start();
        include $path;
        return ob_get_clean();
    }

    return false;
}

function renderController(string $controller, $action, $vars = [])
{
    call_user_func([new $controller, $action]);
}

function is(string $role)
{
    return Auth::is($role);
}

function logged()
{
    return Auth::logged();
}

// function path(string $name, array $params = [])
// {
//     // Application::getRoutes();
//     // foreach($route as $route)
//     // {
//     //     if($route['name'] === $name)
//     //     {
//     //         $url = 
//     //     }
//     // }
//     //get routes from somewhere
//     //if 'name' equeals one from routes
//     //  construct url
//     //return url
// }