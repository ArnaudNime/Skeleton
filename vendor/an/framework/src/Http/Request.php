<?php

namespace AN\Skeleton\Http;

readonly class Request implements RequestInterface
{
    public function __construct(private ?array $params = [])
    {
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getParams(): array
    {
        return $this->params;
    }
}