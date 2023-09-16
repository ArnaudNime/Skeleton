<?php

namespace Config\Route;

use AN\Skeleton\Router\Handler;
use AN\Skeleton\Router\RouteFactoryInterface;
use AN\Skeleton\Router\RouteInterface;
use App\Persister\Item\AddItemFactory;
use App\Renderer\Home\HomeRenderer;

class RouteFactory implements RouteFactoryInterface
{
    public function createHandler(RouteInterface $route): Handler
    {
        return match ($route) {
            Route::HOME => new HomeRenderer(),
            Route::ADD_ITEM => (new AddItemFactory())->create(),
        };
    }
}