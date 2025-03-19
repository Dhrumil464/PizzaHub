<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PizzaItemController;
use App\Http\Controllers\UserController;
use App\Models\Categories;
use App\Models\PizzaItems;
use Illuminate\Support\Facades\Route;

/********************  Admin Part ***********************/

// for direct open with admin index/login page 
Route::get('/admin', [AdminController::class, 'adminIndex'])->name('admin.login'); // dir. /  Controller   /  func.

Route::post('/admin/handleLogin', [AdminController::class, 'handleAdminLogin'])->name('admin.handleAdminLogin');

Route::get('/admin/index/{loginsuccess}', [AdminController::class, 'dashboardIndex'])->name('admin.index');  // dashboard / index

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');  // dashboard

Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout'); // admin logout




/********************  Users Part ***********************/

// Route::get('/', [UserController::class, 'userIndex'])->name('user.index');

Route::get('/viewProfile', [UserController::class, 'viewProfile'])->name('user.viewProfile');

Route::get('/viewOrder', [UserController::class, 'viewOrder'])->name('user.viewOrder');

// Route::get('/viewPizzaList', [UserController::class, 'viewPizzaList'])->name('user.viewPizzaList');

Route::get('/viewPizza/{catid}/{pizzaid}', [UserController::class, 'viewPizza'])->name('user.viewPizza');

Route::get('/viewCart', [UserController::class, 'viewCart'])->name('user.viewCart');

Route::get('/search', [UserController::class, 'search'])->name('user.search');

Route::get('/about', [UserController::class, 'about'])->name('user.about');

Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');

Route::post('/handleUserLogin', [UserController::class, 'handleUserLogin'])->name('user.handleUserLogin');

Route::get('/logout', [UserController::class, 'userLogout'])->name('user.logout');

Route::post('/handleUserSignup', [UserController::class, 'handleUserSignup'])->name('user.handleUserSignup');


/*************************   categories routes   *************************/
Route::get('/admin/dashboard/manageCategory', [CategoryController::class, 'index'])->name('admin.manageCategory');

Route::post('/addCategory', [CategoryController::class, 'addCategory'])->name('category.addCategory');

Route::put('/updateImage/{catid}', [CategoryController::class, 'updateImage'])->name('category.updateImage');

Route::put('/updateCategory/{catid}', [CategoryController::class, 'updateCategory'])->name('category.updateCategory');

Route::get('/destroyCategory/{catid}', [CategoryController::class, 'destroyCategory'])->name('category.destroyCategory');

Route::get('/', [CategoryController::class, 'userIndex'])->name('user.index');

/*************************   pizza items routes   ************************/
Route::get('/admin/dashboard/managePizzaItems', [PizzaItemController::class, 'index'])->name('admin.managePizzaItems');

Route::post('/addPizzaItem', [PizzaItemController::class, 'addPizzaItem'])->name('pizzaitem.addPizzaItem');

Route::put('/updatePizzaImage/{pizzaid}', [PizzaItemController::class, 'updatePizzaImage'])->name('pizzaitem.updatePizzaImage');

Route::put('/updatePizzaItem/{pizzaid}', [PizzaItemController::class, 'updatePizzaItem'])->name('pizzaitem.updatePizzaItem');

Route::get('/destroyPizzaItem/{pizzaid}', [PizzaItemController::class, 'destroyPizzaItem'])->name('pizzaitem.destroyPizzaItem');

Route::get('/viewPizzaList/{catid}', [PizzaItemController::class, 'viewPizzaList'])->name('user.viewPizzaList');