<?php

namespace AN\Skeleton\Container;

use Psr\Container\ContainerInterface;

abstract class Container implements ContainerInterface
{
    protected array $services = [];

    /**
     * @inheritDoc
     */
    public function get(string $id)
    {
        if (!array_key_exists($id, $this->getDeclaredServices())) {
            throw new ServiceNotFound("Unknown key '$id'");
        }

        return static::getDeclaredServices()[$id];
    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
        return array_key_exists($id, $this->getDeclaredServices());
    }

    protected function getDeclaredServices(): array
    {
        return $this->services;
    }
}