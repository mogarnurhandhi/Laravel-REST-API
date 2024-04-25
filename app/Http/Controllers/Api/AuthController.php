<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            $token = auth()->attempt($credentials);
            if(!$token){
                return $this->responseError('Email dan Password Salah', 400);

            }

            return $this->responseOk($this->respondWithToken($token), 200);

        } catch (\Throable $th) {
            \Log::error($th->getMessage());
            return $this->responseError('Internal Server Error', 500);
        }
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ];
    }
}
