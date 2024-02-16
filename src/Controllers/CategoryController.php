<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    private CategoryService $categoryService;

    public function index(): void
    {
        $this->view('category-posts');
    }

    public function manage(): void
    {
        $this->categoryService = new CategoryService($this->db());

        $this->view('admin/manage-categories', ['categories' => $this->categoryService->all()]);
    }

    public function add(): void
    { 
        $this->view('admin/add-category');
    }

    public function edit(): void
    {
        $this->categoryService = new CategoryService($this->db());

        $category = $this->categoryService->find($this->request()->input('id'));

        $this->view('admin/edit-category', ['category' => $category]);
    }

    public function delete(): void
    {
        $this->categoryService = new CategoryService($this->db());

        $this->categoryService->delete($this->request()->input('id'));

        $this->redirect('/admin/dashboard/categories');
    }

    public function store(): void
    {
        $id = $this->request()->input('id', 0);

        $validation = $this->request()->validate([
            'title' => ['required', "unique:categories:category_id:$id", 'min:2', 'max:45'],
            'desc' => ['min:2']
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $name => $error) {
                $this->session()->set($name, $error);
            }

            $this->redirect('/admin/category/add');
        }

        $this->categoryService = new CategoryService($this->db());

        $this->categoryService->insert($this->request()->input('title'), $this->request()->input('desc') ?? null);

        $this->redirect('/admin/dashboard/categories');
    }

    public function update(): void
    {
        $id = $this->request()->input('id', 0);

        $validation = $this->request()->validate([
            'title' => ['required', "unique:categories:category_id:$id", 'min:2', 'max:45'],
            'desc' => ['min:2']
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $name => $error) {
                $this->session()->set($name, $error);
            }

            $this->redirect("/admin/category/edit?id=$id");
        }

        $this->categoryService = new CategoryService($this->db());

        $this->categoryService->update(
            $id,
            $this->request()->input('title'),
            $this->request()->input('desc') ?? null
        );

        $this->redirect('/admin/dashboard/categories');
    }
}
