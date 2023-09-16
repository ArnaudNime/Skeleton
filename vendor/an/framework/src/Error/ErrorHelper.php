<?php

namespace AN\Skeleton\Error;

use AN\Skeleton\Template\Display;
use AN\Skeleton\Template\Interpollate;
use Throwable;

class ErrorHelper
{
    use Display;
    use Interpollate;

    public function thrown(Throwable $e): void
    {
        $template = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'ErrorTemplate.html');
        $this->display($this->interpollate([
            'title' => get_class($e),
            'message' => $e->getMessage(),
        ], $template));

    }
}