<?php

namespace AN\Skeleton\Container;

class Container implements \Psr\Container\ContainerInterface
{
    public function __construct(private array $services)
    {
    }


    /**
     * @inheritDoc
     */
    public function get(string $id)
    {
        if (!array_key_exists($id, $this->services)) {
            throw new ServiceNotFound("Unknown key '{$id}'");
        }
        return $this->services[$id];
    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
    }
}