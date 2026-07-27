<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['erro' => 'Usuario ou senha invalido'], 403);
        }

        return response()->json(['token' => $token]);
    }

    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return response()->json(['msg' => 'Logout realizado com sucesso']);
    }

    public function refresh(): JsonResponse
    {
        $token = auth('api')->refresh();

        return response()->json(['token' => $token]);
    }

    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }
}
