<?php

use App\Http\Controllers\Api\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', [AuthController::class, 'user']);
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
