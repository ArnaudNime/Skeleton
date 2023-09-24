<?php

namespace AN\Skeleton\Router;

use AN\Skeleton\Http\RequestInterface;;

interface Handler
{
    public function handle(RequestInterface $request): void;
}