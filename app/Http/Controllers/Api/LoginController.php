<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = request()->only('email', 'password');

            if(!auth()->attempt($credentials)) abort(401, 'Credenciais inválidas');

            $token = auth()->user()->createToken('auth_token');

            return response()->json([
                'data' => [
                    'token' => $token->plainTextToken
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function logout()
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json([
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
