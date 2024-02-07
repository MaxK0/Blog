<?php

namespace App\Kernel\Middleware;

interface IMiddleware
{
    public function check(array $middlewares = []): void;
}
