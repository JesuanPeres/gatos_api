<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken(env('TOKEN_SEED'))->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Usuário e/ou senha incorretos'
            ], 401);
        }

        $token = $user->createToken(env('TOKEN_SEED'))->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logout concluido com sucesso'
        ];
    }
}
