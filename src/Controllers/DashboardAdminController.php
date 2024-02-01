<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class DashboardAdminController extends Controller {

    public function index() {
        $this->view('admin/dashboard-admin');
    }

}