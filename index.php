<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

include 'src/lib/debug_func.php';
include 'src/lib/html.php';

define('ROOT_PATH', realpath(dirname(__FILE__)));

use Malordo\Application\Application;
use Malordo\Router\Router;

$app = new Application(__DIR__, new Router());
try {
    $app->run();
} catch( \Exception $e) {
    echo $e->getMessage();
}