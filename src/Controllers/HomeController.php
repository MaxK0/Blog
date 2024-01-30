<?php

namespace App\Controllers;

use App\Kernel\View\View;
use App\Kernel\Controller\Controller;

class HomeController extends Controller {

    public function index(): void {       
        $view = new View();
        
        $view->page('home');
    }

}