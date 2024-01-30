<?php

use App\Router\Route;

return [
    Route::get('/home', function() {
        include_once APP_PATH . '/views/pages/index.php';
    }),
    
];