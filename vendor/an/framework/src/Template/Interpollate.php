<?php

namespace AN\Skeleton\Template;

trait Interpollate
{
    public function interpollate(array $vars, string $text): string
    {
        return str_replace(array_keys($vars), array_values($vars), $text);
    }
}