<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductTypesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StoreController::class, 'index']);
Route::get('details/{id}', [StoreController::class, 'product_view']);
Route::get('user_catalog', [StoreController::class, 'index_catalog']);
Route::get('order_details/{id}', [StoreController::class, 'order_details']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'getCart']);
    Route::put('updateUser', [CartController::class, 'updateUser']);
    Route::post('placeOrder', [CartController::class, 'placeOrder']);
    Route::get('orderList', [StoreController::class, 'orderList']);
});

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteCartItem']);
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard','Admin\AdminController@index');

    // Product Type
    Route::get('product_types',[ProductTypesController::class, 'index']);
    Route::get('add_type', [ProductTypesController::class, 'add']);
    Route::post('create_product_type', [ProductTypesController::class, 'create']);
    Route::get('edit_product_type/{id}', [ProductTypesController::class, 'edit']);
    Route::put('update_product_type/{id}', [ProductTypesController::class, 'update']);
    Route::get('delete_product_type/{id}', [ProductTypesController::class, 'destroy']);
    
    // Product
    Route::get('catalogue',[CatalogueController::class, 'index']);
    Route::get('add_item',[CatalogueController::class, 'add']);
    Route::post('create_item',[CatalogueController::class, 'create']);
    Route::get('edit_item/{id}', [CatalogueController::class, 'edit']);
    Route::put('update_item/{id}', [CatalogueController::class, 'update']);
    Route::get('delete_item/{id}', [CatalogueController::class, 'destroy']);
    
    // Users
    Route::get('users',[UserController::class, 'index']);
    Route::get('edit_user/{id}', [UserController::class, 'edit']);
    Route::put('update_user/{id}', [UserController::class, 'update']);
    Route::get('delete_user/{id}', [UserController::class, 'destroy']);
    
    // Orders
    Route::get('orders',[OrderController::class, 'index']);
    Route::get('edit_order/{id}', [OrderController::class, 'edit']);
    Route::put('update_order/{id}', [OrderController::class, 'update']);
    Route::get('delete_order/{id}', [OrderController::class, 'destroy']);
    Route::get('delete_order_item/{id}', [OrderController::class, 'destroy_item']);
});
