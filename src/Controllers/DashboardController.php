<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\PostService;

class DashboardController extends Controller {

    private PostService $postService;
    

    public function index(): void {
        $this->postService = new PostService($this->db());
        
        $posts = $this->postService->findByAuthors($this->auth()->user()->nick());

        $this->view('manage-posts', ['posts' => $posts]);
    }
    
}