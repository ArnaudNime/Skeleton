<?php

namespace App\Example;

use AN\Skeleton\Http\RequestInterface;
use AN\Skeleton\Router\Handler;

class ExampleReplacer implements Handler
{
    public function handle(RequestInterface $request): void
    {
        echo $request->getParams()['id'];
    }
}