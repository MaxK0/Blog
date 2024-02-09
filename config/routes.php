<?php

use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\SignupController;
use App\Controllers\SigninController;
use App\Controllers\DashboardController;
use App\Controllers\DashboardAdminController;
use App\Controllers\CategoryController;
use App\Controllers\PostController;
use App\Controllers\InformationController;
use App\Kernel\Router\Route;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

// [Controller::class, 'index'] - массив с адресом до класса и названием метода для вызова
// Controller::class - адрес до класса

/**
 * Содерижит в себе экземпляры роутов, с определенными методами http, uri и шаблонами для uri.
 */
return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/admin', [AdminController::class, 'index'], [AdminMiddleware::class]),

    Route::get('/signup', [SignupController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/signup', [SignupController::class, 'signup'], [GuestMiddleware::class]),
    Route::get('/signin', [SigninController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/signin', [SigninController::class, 'signin'], [GuestMiddleware::class]),
    Route::get('/logout', [SigninController::class, 'logout'], [AuthMiddleware::class]),

    Route::get('/about', [InformationController::class, 'about']),
    Route::get('/contacts', [InformationController::class, 'contact']),
    Route::get('/services', [InformationController::class, 'services']),

    Route::get('/post', [PostController::class, 'index']),
    Route::get('/post/add', [PostController::class, 'add'], [AuthMiddleware::class]),
    Route::post('/post/add', [PostController::class, 'store'], [AuthMiddleware::class]),
    Route::get('/post/edit', [PostController::class, 'edit'], [AuthMiddleware::class]),
    Route::post('/post/edit', [PostController::class, 'store'], [AuthMiddleware::class]),

    Route::get('/category', [CategoryController::class, 'index']),
    Route::get('/admin/category/add', [CategoryController::class, 'add'], [AdminMiddleware::class]),
    Route::post('/admin/category/add', [CategoryController::class, 'store'], [AdminMiddleware::class]),
    Route::get('/admin/category/edit', [CategoryController::class, 'edit'], [AdminMiddleware::class]),
    Route::post('/admin/category/edit', [CategoryController::class, 'store'], [AdminMiddleware::class]),
    
    Route::get('/dashboard', [DashboardController::class, 'index'], [AuthMiddleware::class]),
    Route::get('/dashboard/posts', [DashboardController::class, 'index'], [AuthMiddleware::class]),
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'], [AdminMiddleware::class]),
    Route::get('/admin/dashboard/posts', [DashboardAdminController::class, 'index'], [AdminMiddleware::class]),
    Route::get('/admin/dashboard/users', [SignupController::class, 'manage'], [AdminMiddleware::class]),
    Route::get('/admin/dashboard/categories', [CategoryController::class, 'manage'], [AdminMiddleware::class]),

    Route::get('/user/edit', [SignupController::class, 'edit'], [AuthMiddleware::class]),
    Route::post('/user/edit', [SignupController::class, 'editUser'], [AuthMiddleware::class]),
    Route::get('/admin/user/edit', [SignupController::class, 'editByAdmin'], [AdminMiddleware::class]),
    Route::post('/admin/user/edit', [SignupController::class, 'editUser'], [AdminMiddleware::class]),
    Route::get('/admin/user/add', [SignupController::class, 'add'], [AdminMiddleware::class]),
    Route::post('/admin/user/add', [SignupController::class, 'signup'], [AdminMiddleware::class]),

];