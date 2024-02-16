<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\PostService;

class DashboardAdminController extends Controller {

    private PostService $postService;

    public function index() {
        $this->postService = new PostService($this->db());

        $this->view('admin/manage-posts-admin', ['posts' => $this->postService->all()]);
    }

}