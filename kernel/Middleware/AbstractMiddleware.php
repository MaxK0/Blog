<?php

namespace App\Kernel\Middleware;

use App\Kernel\Auth\IAuth;
use App\Kernel\Http\IRedirect;
use App\Kernel\Http\IRequest;

abstract class AbstractMiddleware
{

    public function __construct(
        protected IRequest $request,
        protected IAuth $auth,
        protected IRedirect $redirect
    ) {
    }

    abstract public function handle(): void;

}
