<?php

namespace AN\Skeleton\Router\Route;

interface RouteInterface
{
    public static function getHandler(self $route): string;
}