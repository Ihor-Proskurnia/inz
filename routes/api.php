<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Users
    Route::get('users', [UserController::class, 'showUsers'])->name('users.show');
// policy by user RoleType
//        ->can('viewAll', User::class);
    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
//        ->can('view', 'user');
    Route::get('me', [UserController::class, 'me'])->name('user.me');

    // Categories
    Route::get('categories', [CategoryController::class, 'showCategories'])->name('categories.show');
// policy by user RoleType
//        ->can('viewAll', Category::class);
});
