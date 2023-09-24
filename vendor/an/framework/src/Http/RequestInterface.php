<?php

namespace AN\Skeleton\Http;

interface RequestInterface
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getParams(): array;
}