<?php

namespace App;

use App\Router\Router;
use App\Http\Request;

class App {

    public function run() {
        $router = new Router();
        $request = Request::createFromGlobals();

        $router->dispatch($request->uri(), $request->method());
    }

}