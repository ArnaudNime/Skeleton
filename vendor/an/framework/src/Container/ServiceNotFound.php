<?php

namespace AN\Skeleton\Container;

use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFound extends \LogicException implements NotFoundExceptionInterface
{
}