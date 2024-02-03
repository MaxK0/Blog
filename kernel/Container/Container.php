<?php

namespace App\Kernel\Container;

use App\Kernel\Http\IRedirect;
use App\Kernel\Http\IRequest;
use App\Kernel\Router\IRouter;
use App\Kernel\Session\ISession;
use App\Kernel\View\IView;
use App\Kernel\Validator\IValidator;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
use App\Kernel\Session\Session;
use App\Kernel\View\View;
use App\Kernel\Validator\Validator;

class Container {
    public readonly IRequest $request;
    public readonly IRouter $router;
    public readonly IView $view;
    public readonly IValidator $validator;
    public readonly IRedirect $redirect;
    public readonly ISession $session;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices() {
        $this->request = Request::createFromGlobals();
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->redirect = new Redirect();
        $this->session = new Session();
        $this->view = new View($this->session);
        $this->router = new Router($this->view, $this->request, $this->redirect, $this->session);
    }
}