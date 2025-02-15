<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// for direct open with admin index/login page 
Route::get('/admin', [ UserController::class, 'adminIndex' ])->name('admin.index'); // dir. /  Controller   /  func.

Route::post('/admin/handleLogin',[ UserController::class , 'handleAdminLogin' ])->name('admin.handleAdminLogin');

Route::get('/admin/dashboard/{loginsuccess}',[ UserController::class , 'dashboard'])->name('admin.dashboard');

Route::post('/admin/logout', [ UserController::class , 'logout' ])->name('admin.logout');




/********************  Users Part ***********************/

Route::get('/', [UserController::class , 'userIndex'])->name('user.index');

Route::get('/viewProfile', [UserController::class , 'viewProfile'])->name('user.viewProfile');

Route::get('/viewOrder', [UserController::class , 'viewOrder'])->name('user.viewOrder');

Route::get('/viewPizzaList', [UserController::class, 'viewPizzaList'])->name('user.viewPizzaList');

Route::get('/viewPizza', [UserController::class, 'viewPizza'])->name('user.viewPizza');

Route::get('/viewCart', [UserController::class, 'viewCart'])->name('user.viewCart');

Route::get('/search', [UserController::class, 'search'])->name('user.search');

Route::get('/about', [UserController::class, 'about'])->name('user.about');