<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    private CategoryService $service;

    public function index(): void
    {
        $this->view('category-posts');
    }

    public function manage(): void
    {
        $this->view('admin/manage-categories');
    }

    public function add(): void
    {
        $this->view('admin/add-category');
    }

    public function edit(): void
    {
        $this->view('admin/edit-category');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'title' => ['required', 'min:2', 'max:45'],
            'desc' => ['min:2']
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $name => $error) {
                $this->session()->set($name, $error);
            }

            if ($this->request()->uri() == '/admin/category/add') $this->redirect('/admin/category/add');
            else if ($this->request()->uri() == '/admin/category/edit') $this->redirect('/admin/category/edit');
        }

        $this->service = new CategoryService($this->db());

        $this->service->insert($this->request()->input('title'), $this->request()->input('desc') ?: null);

        $this->redirect('/admin');
    }
}
