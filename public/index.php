<?php

require_once '../vendor/autoload.php';
require_once '../vendor/an/framework/src/DebugFunctions.php';

const PUBLIC_PATH = __DIR__ . DIRECTORY_SEPARATOR;

use AN\Skeleton\Error\ErrorHelper;
use AN\Skeleton\Http\Request;
use AN\Skeleton\Router\Router;
use Config\Container\Container;

try {
    (new Router(new Container(), new Request()))->match();
} catch(Throwable $e) {
    (new ErrorHelper())->thrown($e);
}











