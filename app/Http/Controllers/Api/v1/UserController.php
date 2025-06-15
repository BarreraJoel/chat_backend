<?php

namespace App\Http\Controllers\Api\v1;

use App\Classes\Api\v1\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\MiniUserResource;
use App\Models\Api\v1\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return ApiResponse::response(
            true,
            null,
            ['users' => MiniUserResource::collection($users)]
        );
    }

    public function show(User $user)
    {
        return ApiResponse::response(
            true,
            null,
            ['user' => $user]
        );
    }
}
