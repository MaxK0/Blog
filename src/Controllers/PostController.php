<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\PostService;

class PostController extends Controller
{

    private PostService $postService;
    private CategoryService $categoryService;

    public function __construct()
    {
    }

    public function index(): void
    {
        $this->postService = new PostService($this->db());

        $post = $this->postService->find($this->request()->input('id'));

        $this->view('post', ['post' => $post]);
    }

    public function add(): void
    {
        $this->categoryService = new CategoryService($this->db());
        $this->view('add-post', ['categories' => $this->categoryService->all()]);
    }

    public function edit(): void
    {
        $this->postService = new PostService($this->db());

        if (!$this->auth()->user()->isAdmin()) {
            if ($this->auth()->user()->id() != $this->request()->input('id')) $this->redirect('/dashboard');
        }

        $post = $this->postService->find($this->request()->input('id'));

        $this->view('edit-post', ['post' => $post]);
    }

    public function delete(): void
    {
        $this->postService = new PostService($this->db());
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

        $this->postService = new PostService($this->db());

        $title = $this->request()->input('title');
        $body = $this->request()->input('text');
        $thumbnail = $this->request()->file('thumbnail')->move('posts');
        $dateTime = date_format(new \DateTime(), 'Y-m-d h:i:s');
        $isFeatured = $this->request()->input('isFeatured', 0);
        $authorId = $this->auth()->user()->id();
        $categories = $this->request()->input('category');

        $this->postService->insert($title, $body, $thumbnail, $dateTime, $isFeatured, $authorId, [$categories]);

        $this->redirect('/home');
    }

    public function update(): void
    {
        $validate = $this->request()->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'category' => ['required'],
            'text' => ['required'],
            'thumbnail' => ['fileSize:5']
        ]);

        if (!$validate) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect("/post/edit?id={$this->request()->input('id')}");
        }

        $this->postService = new PostService($this->db());

        $id = $this->request()->input('id');
        $title = $this->request()->input('title');
        $body = $this->request()->input('text');

        $thumbnail = $this->request()->file('thumbnail');
        if (!empty($thumbnail)) $thumbnail = $this->request()->file('thumbnail')->move('posts');

        $dateTime = date_format(new \DateTime(), 'Y-m-d h:i:s');
        $isFeatured = $this->request()->input('isFeatured', 0);
        $categories = $this->request()->input('category');

        $this->postService->update($id, $title, $body, $thumbnail, $dateTime, $isFeatured, [$categories]);

        if ($this->auth()->check()) $this->redirect('/admin');
        else $this->redirect('/dashboard');
    }
}
