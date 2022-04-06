<?php

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