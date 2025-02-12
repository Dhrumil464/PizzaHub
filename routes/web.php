<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// for direct open with admin index/login page 
Route::get('/admin', [ UserController::class, 'adminIndex' ])->name('admin.index'); // dir. /  Controller   /  func.

Route::post('/admin/handleLogin',[ UserController::class , 'handleLogin' ])->name('admin.handleLogin');

Route::get('/admin/dashboard/{loginsuccess}',[ UserController::class , 'dashboard'])->name('admin.dashboard');

Route::post('/admin/logout', [ UserController::class , 'logout' ])->name('admin.logout');