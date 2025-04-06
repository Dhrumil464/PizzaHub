<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PizzaItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
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


/*************************   Profile Manage routes   ************************/
Route::get('/userManage', [UserController::class, 'userManageView'])->name('admin.userManageView');

Route::post('/userManage/addUser', [UserController::class, 'userManageAdd'])->name('admin.userManageAdd');

Route::put('/userManage/updateUser/{userid}', [UserController::class, 'userManageUpdate'])->name('admin.userManageUpdate');

Route::get('/userManage/destroyUser/{userid}', [UserController::class, 'userManageDestroy'])->name('admin.userManageDestroy');



/********************  Users Part ***********************/

Route::get('/viewOrder', [UserController::class, 'viewOrder'])->name('user.viewOrder');

Route::get('/search', [UserController::class, 'search'])->name('user.search');

Route::get('/about', [UserController::class, 'about'])->name('user.about');

Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');

Route::post('/handleUserSignup', [UserController::class, 'handleUserSignup'])->name('user.handleUserSignup');

Route::post('/handleUserLogin', [UserController::class, 'handleUserLogin'])->name('user.handleUserLogin');

Route::get('/logout', [UserController::class, 'userLogout'])->name('user.logout');

Route::get('/viewProfile', [UserController::class, 'viewProfile'])->name('user.viewProfile');

Route::put('/manageProfile/{userid}', [UserController::class, 'manageProfile'])->name('user.manageProfile');



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

Route::get('/viewPizza/{catid}/{pizzaid}', [PizzaItemController::class, 'viewPizza'])->name('user.viewPizza');



/*************************   other routes   ************************/
Route::get('/admin/dashboard/manageOrders', [AdminController::class, 'manageOrders'])->name('admin.manageOrders');
Route::get('/admin/dashboard/contactManage', [AdminController::class, 'contactManage'])->name('admin.contactManage');
Route::get('/admin/dashboard/siteManage', [AdminController::class, 'siteManage'])->name('admin.siteManage');


/*************************   cart routes   ************************/
Route::get('/pizzaCart', [CartController::class, 'showCart'])->name('user.showCart');

Route::post('/addToCart/{pizzaid}', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/removeFromCart/{cartitemid}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/clearCart', [CartController::class, 'clearCart'])->name('cart.clear');

Route::post('/cart/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');