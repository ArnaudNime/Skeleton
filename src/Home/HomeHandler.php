<?php

namespace App\Home;

use AN\Skeleton\Router\Handler;
use AN\Skeleton\Http\RequestInterface;

class HomeHandler implements Handler
{
    public function handle(RequestInterface $request): void
    {
        echo file_get_contents(PUBLIC_PATH . 'templates/index.html');
    }
}