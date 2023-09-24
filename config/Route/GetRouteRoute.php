<?php

namespace Config\Route;

use AN\Skeleton\Router\Route\GetRouteInterface;
use AN\Skeleton\Router\Route\RouteInterface;
use AN\Skeleton\Router\UnknownRoute;
use App\Example\ExampleRenderer;
use App\Home\HomeHandler;

enum GetRouteRoute: string implements GetRouteInterface
{
    case HOME = "/";
    case GET_EXAMPLE = '/example/{id}';

    public static function getHandler(RouteInterface $route): string
    {
        return match ($route) {
            self::HOME => HomeHandler::class,
            self::GET_EXAMPLE => ExampleRenderer::class,
            default => new UnknownRoute($route->value),
        };
    }
}
