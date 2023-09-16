<?php

namespace AN\Skeleton\Router;

interface RouteFactoryInterface
{
    public function createHandler(RouteInterface $route): Handler;
}