<?php

namespace App\Kernel\Controller;

use App\Kernel\View\View;
use App\Kernel\Http\Request;
use App\Kernel\Http\Redirect;

abstract class Controller {

    private View $view;
    private Request $request;
    private Redirect $redirect;

    public function view(string $name): void {
        $this->view->page($name);
    }

    public function setView(View $view): void {
        $this->view = $view;
    }

    public function request(): Request {
        return $this->request;
    }

    public function setRequest(Request $request): void {
        $this->request = $request;
    }

    public function redirect(string $url): void {
        $this->redirect->to($url);
    }

    public function setRedirect(Request $request): void {
        $this->request = $request;
    }

}