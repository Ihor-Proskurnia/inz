<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Auth\VerificationController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('change', [AuthController::class, 'changePassword'])->name('change')->middleware('oldPassword');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('forgot', [AuthController::class, 'forgot'])->name('forgot');
