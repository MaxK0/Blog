<?php

namespace App\Kernel;

use App\Kernel\Router\Router;
use App\Kernel\Http\Request;

class App {

    public function run() {
        $router = new Router();
        $request = Request::createFromGlobals();

        $router->dispatch($request->uri(), $request->method());
    }

}