<?php

namespace Config\Container;

use AN\Skeleton\Container\Container as SkeletonContainer;
use AN\Skeleton\Router\Route\GetRouteInterface;
use Config\Route\GetRouteRoute;

class Container extends SkeletonContainer
{
    protected array $services = [
    ];

    private function getRoutes(): array
    {
        return [
            GetRouteInterface::class => GetRouteRoute::class,
        ];
    }

    protected function getDeclaredServices(): array
    {
       return array_merge(
           $this->services,
           $this->getRoutes()
       );
    }
}