<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;

class AuthController extends Controller
{
    public function signup(RegisterFormRequest $request)
    {
        User::create([
            'username'  => $request->json('username'),
            'email'     => $request->json('email'),
            'password'  => bcrypt($request->json('password')),
        ]);
    }

    public function signin(Request $request)
    {
        $token = JWTAuth::attempt($request->only('email', 'password'));
    }
}
