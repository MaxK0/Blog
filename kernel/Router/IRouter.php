<?php

namespace App\Kernel\Router;

interface IRouter {

    public function dispatch(string $uri, string $method): void;

}