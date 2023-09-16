<?php

namespace AN\Skeleton\Router;

use LogicException;

class UnknownRoute extends LogicException
{
    private const MESSAGE = "Unknown route : %S";

    public function __construct(string $route)
    {
        parent::__construct(sprintf(self::MESSAGE, $route));
    }
}