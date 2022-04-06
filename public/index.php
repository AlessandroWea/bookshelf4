<?php

declare(strict_types=1);

require '../vendor/autoload.php';

include '../src/lib/debug_func.php';
include '../src/lib/html.php';

define('ROOT_PATH', realpath(dirname(__FILE__)));

use Malordo\Application\Application;
use Malordo\Router\Router;

$app = new Application(dirname(ROOT_PATH), new Router());
try {
    $app->run();
} catch( \Exception $e) {
    echo $e->getMessage();
}