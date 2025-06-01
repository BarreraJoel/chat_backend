<?php

namespace App\Http\Controllers\Api\v1;

use App\Classes\Api\v1\ApiResponse;
use App\Enums\Api\v1\UserStatusEnum;
use App\Events\Api\v1\UserLogged;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Resources\Api\v1\UserResource;
use App\Models\Api\v1\User;
use App\Services\Api\v1\AuthService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function login(LoginRequest $request)
    {
        #email - password
        $data = $request->validated();
        $user = $this->authService->login($data);

        if (!isset($user)) {
            throw new ModelNotFoundException('Usuario no encontrado', Response::HTTP_NOT_FOUND);
        }

        event(new UserLogged($user, UserStatusEnum::Online));

        // UserLogged::dispatch($user, UserStatusEnum::Online);

        return ApiResponse::response(
            true,
            'Inicio de sesión exitoso',
            [
                'user' => new UserResource($user)
            ]
        );
    }
    public function register(RegisterRequest $request) {}

    public function user(Request $request)
    {
        // $user = $this->authService->user();
        $user = $request->user();

        return ApiResponse::response(
            true,
            null,
            [
                'user' => new UserResource($user)
            ]
        );
    }
    public function logout(Request $request)
    {
        $this->authService->logout();
        // Log::info('logout: ' . $request->user());
        // UserLogged::dispatch($request->user(), UserStatusEnum::Offline);
        event(new UserLogged($request->user(), UserStatusEnum::Offline));

        return ApiResponse::response(
            true,
            'Cierre de sesión exitoso',
            null
        );
    }
}
