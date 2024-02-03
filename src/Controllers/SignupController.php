<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class SignupController extends Controller {

    public function index(): void {
        $this->view('signup');
    }    

    public function edit(): void {
        $this->view('edit-user');
    }

    public function editByAdmin(): void {
        $this->view('admin/edit-user-admin');
    }

    public function add(): void {
        $this->view('admin/add-user');
    }

    public function manage(): void {
        $this->view('admin/manage-users');
    }
    
    public function signup(): void {
        $validate = $this->request()->validate(
            [
                'name' => ['required', 'min:2', 'max:45'],
                'surname' => ['required', 'min:2', 'max:45'],
                'nick' => ['required', 'unique:users', 'min:2', 'max:45'],
                'email' => ['email', 'unique:users', 'max:100'],
                'password' => ['required', 'min:6', 'max:45'],
                'passwordRepeat' => ['required', 'passwordRepeat']
            ]
        );

        if (!$validate) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/signup');

        };

    }

}