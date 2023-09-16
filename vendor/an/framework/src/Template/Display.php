<?php

namespace AN\Skeleton\Template;

trait Display
{
    public function display(string $displayed): void
    {
        echo $displayed;
        die;
    }
}