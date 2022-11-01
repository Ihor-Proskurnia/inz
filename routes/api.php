<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\User\UserController;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|-----------UserController.php---------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Users
    Route::get('users', [UserController::class, 'showUsers'])->name('users.show');
//        ->can('showUsers', User::class);
    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
//        ->can('show', 'user');
    Route::get('me', [UserController::class, 'me'])->name('user.me');

    // Categories
    Route::get('categories', [CategoryController::class, 'showCategories'])->name('categories.show');
// policy by user RoleType
//        ->can('viewAll', Category::class);

    // Orders
    Route::get('orders/category/{category_id}', [OrderController::class, 'showByCategory'])
        ->name('orders.show.category');
    Route::get('orders/trainer/{trainer_id}', [OrderController::class, 'showByTrainer'])
        ->name('orders.show.trainer');
//        ->can('showByTrainer', Order::class);
    Route::post('orders/{trainer_id}', [OrderController::class, 'addOrder'])
        ->name('orders.add');
//        ->can('addOrder', Order::class);

    // Records
    Route::post('orders/{trainer_id}', [OrderController::class, 'addOrder'])
        ->name('orders.add');


});
