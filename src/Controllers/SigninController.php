<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class SigninController extends Controller {

    public function index(): void {
        $this->view('signin');
    }

    public function signin(): void {
        $email = $this->request()->input('login');
        $password = $this->request()->input('password');

        $this->auth()->attempt($email, $password);
    }

} 