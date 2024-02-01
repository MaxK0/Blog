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

// [Controller::class, 'index'] - массив с адресом до класса и названием метода для вызова
// Controller::class - адрес до класса

/**
 * Содерижит в себе экземпляры роутов, с определенными методами http, uri и шаблонами для uri.
 */
return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/admin', [AdminController::class, 'index']),

    Route::get('/signup', [SignupController::class, 'index']),
    Route::post('/signup', [SignupController::class, 'signup']),
    Route::get('/signin', [SigninController::class, 'index']),
    Route::post('/signin', [SigninController::class, 'signin']),

    Route::get('/about', [InformationController::class, 'about']),
    Route::get('/contacts', [InformationController::class, 'contact']),
    Route::get('/services', [InformationController::class, 'services']),

    Route::get('/post', [PostController::class, 'index']),
    Route::get('/post/add', [PostController::class, 'add']),
    Route::post('/post/add', [PostController::class, 'store']),
    Route::get('/post/edit', [PostController::class, 'edit']),
    Route::post('/post/edit', [PostController::class, 'store']),

    Route::get('/category', [CategoryController::class, 'index']),
    Route::get('/admin/category/add', [CategoryController::class, 'add']),
    Route::post('/admin/category/add', [CategoryController::class, 'store']),
    Route::get('/admin/category/edit', [CategoryController::class, 'edit']),
    Route::post('/admin/category/edit', [CategoryController::class, 'store']),
    
    Route::get('/dashboard', [DashboardController::class, 'index']),
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index']),
    Route::get('/admin/dashboard/users', [SignupController::class, 'manage']),
    Route::get('/admin/dashboard/categories', [CategoryController::class, 'manage']),

    Route::get('/user/edit', [SignupController::class, 'edit']),
    Route::post('/user/edit', [SignupController::class, 'signup']),
    Route::get('/admin/user/edit', [SignupController::class, 'editByAdmin']),
    Route::post('/admin/user/edit', [SignupController::class, 'signup']),
    Route::get('/admin/user/add', [SignupController::class, 'add']),
    Route::post('/admin/user/add', [SignupController::class, 'signup']),

];