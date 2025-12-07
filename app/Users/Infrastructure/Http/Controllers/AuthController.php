<?php

namespace App\Users\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users\Application\Services\AuthService;
use App\Users\Infrastructure\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $result = $this->authService->login($data['email'], $data['password']);

        return response()->json($result);
    }
}