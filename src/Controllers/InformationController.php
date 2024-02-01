<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class InformationController extends Controller {

    public function about(): void {
        $this->view('about');
    }

    public function contact(): void {
        $this->view('contact');
    }

    public function services(): void {
        $this->view('services');
    }

}