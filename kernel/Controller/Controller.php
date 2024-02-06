<?php

namespace App\Kernel\Controller;

use App\Kernel\Auth\IAuth;
use App\Kernel\Database\IDatabase;
use App\Kernel\View\IView;
use App\Kernel\Http\IRequest;
use App\Kernel\Http\IRedirect;
use App\Kernel\Session\ISession;

abstract class Controller {

    private IView $view;
    private IRequest $request;
    private IRedirect $redirect;
    private ISession $session;
    private IDatabase $database;
    private IAuth $auth;

    public function view(string $name): void {
        $this->view->page($name);
    }

    public function setView(IView $view): void {
        $this->view = $view;
    }

    public function request(): IRequest {
        return $this->request;
    }

    public function setRequest(IRequest $request): void {
        $this->request = $request;
    }

    public function redirect(string $url): void {
        $this->redirect->to($url);
    }

    public function setRedirect(IRedirect $redirect): void {
        $this->redirect = $redirect;
    }

    public function session(): ISession {
        return $this->session;
    }

    public function setSession(ISession $session): void {
        $this->session = $session;
    }

    public function db(): IDatabase {
        return $this->database;
    }

    public function setDatabase(IDatabase $database): void {
        $this->database = $database;
    }

    public function auth(): IAuth {
        return $this->auth;
    }

    public function setAuth(IAuth $auth) {
        $this->auth = $auth;
    }

}