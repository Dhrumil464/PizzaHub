<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// for direct open with admin index/login page 
Route::get('/admin', [ UserController::class, 'adminIndex' ])->name('admin.login'); // dir. /  Controller   /  func.

Route::post('/admin/handleLogin',[ UserController::class , 'handleAdminLogin' ])->name('admin.handleAdminLogin');

Route::get('/admin/index/{loginsuccess}',[ UserController::class , 'dashboardIndex'])->name('admin.index');  // dashboard / index

Route::get('/admin/dashboard/{page}',[ UserController::class , 'adminDashboard'])->name('admin.dashboard');  // dashboard

Route::get('/admin/logout', [ UserController::class , 'adminLogout' ])->name('admin.logout');




/********************  Users Part ***********************/

Route::get('/', [UserController::class , 'userIndex'])->name('user.index');

Route::get('/viewProfile', [UserController::class , 'viewProfile'])->name('user.viewProfile');

Route::get('/viewOrder', [UserController::class , 'viewOrder'])->name('user.viewOrder');

Route::get('/viewPizzaList', [UserController::class, 'viewPizzaList'])->name('user.viewPizzaList');

Route::get('/viewPizza', [UserController::class, 'viewPizza'])->name('user.viewPizza');

Route::get('/viewCart', [UserController::class, 'viewCart'])->name('user.viewCart');

Route::get('/search', [UserController::class, 'search'])->name('user.search');

Route::get('/about', [UserController::class, 'about'])->name('user.about');

Route::post('/handleUserLogin', [UserController::class, 'handleUserLogin'])->name('user.handleUserLogin');

Route::get('/logout', [UserController::class, 'userLogout'])->name('user.logout');

Route::post('/handleUserSignup', [UserController::class, 'handleUserSignup'])->name('user.handleUserSignup');