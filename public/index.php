<?php

require_once '../vendor/autoload.php';

const PUBLIC_PATH = __DIR__ . DIRECTORY_SEPARATOR;

use AN\Skeleton\Container\Container;
use AN\Skeleton\Error\ErrorHelper;
use AN\Skeleton\Router\Router;
use AN\Skeleton\Router\RouteInterface;
use Config\Route\Route;
use Config\Route\RouteFactory;
use AN\Skeleton\Router\RouteFactoryInterface;

try {
    $container = new Container([
        RouteInterface::class => Route::class,
        RouteFactoryInterface::class => new RouteFactory(),
    ]);
    (new Router($container))->match();
} catch(Throwable $e) {
    (new ErrorHelper())->thrown($e);
}











