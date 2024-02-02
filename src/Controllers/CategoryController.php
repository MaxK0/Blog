<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class CategoryController extends Controller {

    public function index(): void {
        $this->view('category-posts');
    }

    public function manage(): void {
        $this->view('admin/manage-categories');
    }

    public function add(): void {
        $this->view('admin/add-category');
    }

    public function edit(): void {
        $this->view('admin/edit-category');
    }

    public function store(): void {
        
    }

}