<?php

use App\Http\Controllers\Api\v1\ChatController;
use Illuminate\Support\Facades\Route;

Route::apiResource('chats', ChatController::class)
    ->middleware('auth:sanctum');
