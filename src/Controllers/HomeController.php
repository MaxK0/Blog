<?php

namespace App\Controllers;

class HomeController {

    /** Создает страницу сайта */
    public function index() {
        include_once APP_PATH . '/views/pages/index.php';
    }

}