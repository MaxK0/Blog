<?php

namespace App\Kernel\Container;

use App\Kernel\Auth\Auth;
use App\Kernel\Auth\IAuth;
use App\Kernel\Config\IConfig;
use App\Kernel\Http\IRedirect;
use App\Kernel\Http\IRequest;
use App\Kernel\Router\IRouter;
use App\Kernel\Session\ISession;
use App\Kernel\View\IView;
use App\Kernel\Validator\IValidator;
use App\Kernel\Config\Config;
use App\Kernel\Database\Database;
use App\Kernel\Database\IDatabase;
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
    public readonly IConfig $config;
    public readonly IDatabase $database;
    public readonly IAuth $auth;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices() {
        $this->request = Request::createFromGlobals();
        $this->config = new Config();
        $this->database = new Database($this->config);
        $this->validator = new Validator($this->database);
        $this->session = new Session();
        $this->request->setValidator($this->validator);
        $this->request->setSession($this->session);
        $this->redirect = new Redirect();
        $this->auth = new Auth($this->database, $this->session, $this->config);
        $this->view = new View($this->session, $this->auth);
        $this->router = new Router($this->view, $this->request, $this->redirect, $this->session, $this->database, $this->auth);
    }
}