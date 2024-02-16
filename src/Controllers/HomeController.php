<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\PostService;

class HomeController extends Controller {

    private PostService $postService;

    public function index(): void {  
        $this->postService = new PostService($this->db());
        
        $this->view('home', ['posts' => $this->postService->all()]);
    }

}