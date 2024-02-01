<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class PostController extends Controller {

    public function index(): void {
        $this->view('post');
    }

    public function add(): void {
        $this->view('add-post');
    }

    public function edit(): void {
        $this->view('edit-post');
    }

    public function store(): void {

    }

}