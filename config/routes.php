<?php

use App\Controllers\HomeController;
use App\Kernel\Router\Route;

// [Controller::class, 'index'] - массив с адресом до класса и названием метода для вызова
// Controller::class - адрес до класса

/**
 * Содерижит в себе экземпляры роутов, с определенными методами http, uri и шаблонами для uri.
 */
return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/home', [HomeController::class, 'index']),
    
];