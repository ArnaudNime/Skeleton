<?php

namespace Config\Route;
use AN\Skeleton\Router\RouteInterface;

enum Route: string implements RouteInterface
{
    case HOME = "/";
    const ADD_ITEM = '/item/add';
}
