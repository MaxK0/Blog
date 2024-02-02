<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class DashboardController extends Controller {

    public function index(): void {
        $this->view('manage-posts');
    }
    
}