<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\PostService;

class PostController extends Controller
{

    private PostService $service;
    private CategoryService $categoryService;

    public function __construct()
    {
        
    }

    public function index(): void
    {        
        $this->view('post');
    }

    public function add(): void
    {        
        $this->categoryService = new CategoryService($this->db());
        $this->view('add-post', ['categories' => $this->categoryService->all()]);
    }

    public function edit(): void
    {
        $this->view('edit-post');
    }

    public function store(): void
    {
        $validate = $this->request()->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'category' => ['required'],
            'text' => ['required'],
            'thumbnail' => ['required', 'fileSize:5']
        ]);

        if (!$validate) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/post/add');
        }

        $this->service = new PostService($this->db());

        $title = $this->request()->input('title');
        $body = $this->request()->input('text');
        $thumbnail = $this->request()->file('thumbnail')->move('posts');
        $dateTime = date_format(new \DateTime(), 'Y-m-d h:i:s');
        $isFeatured = $this->request()->input('isFeatured', 0);
        $authorId = $this->auth()->user()->id();
        $categories = $this->request()->input('category');

        $this->service->insert($title, $body, $thumbnail, $dateTime, $isFeatured, $authorId, [$categories]);

        $this->redirect('/home');
    }
}
