<?php

use App\Http\Controllers\Api\v1\MessageController;
use Illuminate\Support\Facades\Route;

Route::apiResource('messages', MessageController::class)
    ->middleware('auth:sanctum');
