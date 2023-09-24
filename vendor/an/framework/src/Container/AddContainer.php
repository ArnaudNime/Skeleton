<?php

namespace AN\Skeleton\Container;

use Psr\Container\ContainerInterface;

trait AddContainer
{
    public function __construct(private readonly ContainerInterface $container)
    {
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}