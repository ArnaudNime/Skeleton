<?php

namespace App\Renderer\Home;


use AN\Skeleton\Router\Handler;

class HomeRenderer implements Handler
{
    public function handle(): void
    {
        echo file_get_contents(PUBLIC_PATH . 'templates/index.html');
    }
}