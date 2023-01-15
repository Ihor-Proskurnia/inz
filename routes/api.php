<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\RecordController;
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
    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('me', [UserController::class, 'me'])->name('user.me');

    // Categories
    Route::get('categories', [CategoryController::class, 'showCategories'])->name('categories.show');

    // Orders
    Route::get('orders/category/{category_id}', [OrderController::class, 'showByCategory'])
        ->name('orders.show.category');
    Route::get('orders/trainer/{trainer_id}', [OrderController::class, 'showByTrainer'])
        ->name('orders.show.trainer');
    Route::delete('orders/delete/{order_id}', [OrderController::class, 'delete'])
        ->name('orders.delete');
    Route::post('orders/{trainer_id}', [OrderController::class, 'addOrder'])
        ->name('orders.add');
    Route::get('orders', [OrderController::class, 'getOrders'])
        ->name('orders.all');

    // Records
    Route::post('record/{order_id}', [RecordController::class, 'addRecord'])
        ->name('add.record');
    Route::get('records/{user_id}', [RecordController::class, 'getByUser'])
        ->name('records.show.user');
    Route::delete('record/delete/{record_id}', [RecordController::class, 'delete'])
        ->name('records.delete');

});
