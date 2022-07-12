<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\CoreJsonTrait;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use CoreJsonTrait;
    
    public function register (RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $success['user'] = $user->getResource();
        $success['token'] = $user->createToken('Laravel Password Grant Client')->accessToken;
        return $this->ok($success, null, 'Register has been successfully!');
    }

    /**
     * =======================================================================================
     * Login User
    */
    public function login (LoginRequest $request) {
        $data = $request->validated();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = Auth::user();
            $success['user'] = $user->getResource();
            $success['token'] = $user->createToken('Laravel Password Grant Client')->accessToken;
            return $this->ok($success, null, 'Login has been successfully!');
        } else {
            return $this->invalidRequest(null, 'The given data was invalid!');
        }

    }

    /**
     * =======================================================================================
     * Logout User
    */
    public function logout(Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        return $this->ok(null, null, 'You have been successfully logged out!');
    }
}