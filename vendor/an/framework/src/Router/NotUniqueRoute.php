<?php

namespace AN\Skeleton\Router;

use LogicException;

class NotUniqueRoute extends LogicException
{
    public function __construct()
    {
        parent::__construct("There is a duplicated route");
    }
}