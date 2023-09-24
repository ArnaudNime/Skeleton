<?php

namespace AN\Skeleton\Router;

use AN\Skeleton\Http\Request;
use AN\Skeleton\Http\RequestInterface;
use AN\Skeleton\Router\Route\GetRouteInterface;
use AN\Skeleton\Router\Route\PostRouteInterface;
use AN\Skeleton\Router\Route\RouteInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Router
{
    private mixed $routes;

    /**
     * @param ContainerInterface $container
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct(
        private readonly ContainerInterface $container,
        private RequestInterface $request
    ) {
        $this->routes = match ($this->request->getMethod()) {
            'GET' => $container->get(GetRouteInterface::class),
            'POST' => $container->get(PostRouteInterface::class),
            default => throw new UnknownRequestMethod($this->request->getMethod()),
        };
    }

    /**
     * @return void
     * @throws UnknownRoute
     */
    public function match(): void
    {
        $this->getHandler()->handle($this->request);
    }

    private function getHandler(): Handler
    {
        $route = $this->getWantedRoute();
        $handlerClass = $route::getHandler($route);


        return new $handlerClass($this->container);
    }

    /**
     * @throws UnknownRoute
     */
    private function getWantedRoute(): RouteInterface
    {
        $wantedRoute = $this->request->getUri() ?? '/';
        $existingRoutes = $this->getExistingRoutes();

        $routesParts = explode('/', $wantedRoute);

        foreach ($existingRoutes as $existingRoute) {
            $existingRoutesParts = explode('/', $existingRoute);
            $diff = array_diff($routesParts, $existingRoutesParts);


            if (count($diff) === 0) {
                return $this->routes::from($existingRoute);
            }

            if (count($existingRoutesParts) !== count($routesParts)) {
                continue;
            }

            $params = [];
            foreach (array_keys($diff) as $key) {
                if (preg_match('/{.*}/', $existingRoutesParts[$key])) {
                    $param = str_replace(['{', '}'], '', $existingRoutesParts[$key]);
                    $params[$param] = $routesParts[$key];
                } else {
                    continue 2;
                }
            }

            $this->request = new Request($params);

            return $this->routes::from($existingRoute);
        }

        throw new UnknownRoute($wantedRoute);
    }

    private function getExistingRoutes(): array
    {
        $routes = array_map(fn($enum) => $enum->value, $this->routes::cases());

        if (count($routes) !== count(array_unique($routes))) {
            throw new NotUniqueRoute();
        }

        return $routes;
    }
}