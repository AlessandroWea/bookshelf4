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
    $obj = new $controller();
    if($obj === null)
        throw new \Exception("Class $controller doesn't exist");
    echo $obj->$action($vars ? extract($vars) : null);
}

function is(string $role)
{
    return Auth::is($role);
}

function logged()
{
    return Auth::logged();
}

function userId()
{
    return Auth::getUserId();
}