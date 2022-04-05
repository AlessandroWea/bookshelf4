<?php

declare(strict_types=1);

require '../vendor/autoload.php';

define('ROOT_PATH', realpath(dirname(__FILE__)));

use Malordo\Application\Application;
use Malordo\Router\Router;

$app = new Application(ROOT_PATH, new Router());

// $app->run();