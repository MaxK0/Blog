<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class CategoryController extends Controller
{

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

            $this->redirect('/admin/category/add');
        }

        $this->db()->insert('categories', [
            'title' => $this->request()->input('title'),
            'description' => $this->request()->input('description') ?? null
        ]);

        $this->redirect('/home');
    }
}
