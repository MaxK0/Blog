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

    }

}