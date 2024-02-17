<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\PostService;

class HomeController extends Controller {

    private PostService $postService;
    private CategoryService $categoryService;

    public function index(): void {  
        $this->postService = new PostService($this->db());
        $this->categoryService = new CategoryService($this->db());

        $this->view('home', ['posts' => $this->postService->all(), 'categories' => $this->categoryService->all()]);
    }

}