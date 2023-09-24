<?php

namespace AN\Skeleton\Router;

use LogicException;

class UnknownRequestMethod extends LogicException
{
    public function __construct(string $method)
    {
        parent::__construct("There is no route with request method : $method");
    }
}