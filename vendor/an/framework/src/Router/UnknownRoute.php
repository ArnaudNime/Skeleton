<?php

namespace AN\Skeleton\Router;

use LogicException;

class UnknownRoute extends LogicException
{

    public function __construct(string $route)
    {
        parent::__construct("Unknown route : $route");
    }
}