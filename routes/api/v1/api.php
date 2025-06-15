<?php

use App\Events\Api\v1\PruebaEvent;
use App\Models\Api\v1\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . "/auth/auth.php";
require_once __DIR__ . "/chats/chats.php";
require_once __DIR__ . "/messages/messages.php";
require_once __DIR__ . "/users/users.php";

Broadcast::routes(['middleware' => ['auth:sanctum']]);