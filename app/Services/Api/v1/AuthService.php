<?php

namespace App\Services\Api\v1;

use App\Models\Api\v1\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct() {}

    public function login($data): User|null
    {
        Auth::attempt($data);
        return Auth::user();
    }

    public function register($data) {}

    public function user() {
        return Auth::user();
    }

    public function logout() {
        Auth::guard('web')->logout();
    }

    private function createUser($data)
    {
        return User::create($data);
    }
}
