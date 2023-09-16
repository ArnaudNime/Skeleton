<?php

namespace AN\Skeleton\Router;

use AN\Skeleton\Server\Request;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;

class Router
{
    private mixed $routes;
    private $routeFactories;

    public function __construct(ContainerInterface $container)
    {
        $this->routes = $container->get(RouteInterface::class);
        $this->routeFactories = $container->get('RouteFactoryInterface::class');
    }

    /**
     * @return void
     * @throws UnknownRoute
     */
    public function match(): void
    {
        $this->getRequest();
        $handler = $this->routeFactories->createHandler($this->getWantedRoute());
        $handler->handle();
    }

    /**
     * @return Route
     * @throws UnknownRoute
     */
    private function getWantedRoute(): RouteInterface
    {
        $wantedRoute = array_key_first($_GET) ?? '/';
        $existingRoutes = array_map(fn($enum) => $enum->value,  $this->routes::cases());
        if (!in_array($wantedRoute, $existingRoutes)) {
            throw new UnknownRoute($wantedRoute);
        }

        return  $this->routes::from($wantedRoute);
    }

    private function getRequest()
    {
        return new Request();
    }
}