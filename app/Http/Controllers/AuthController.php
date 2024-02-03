<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginReuest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function login(LoginReuest $request){
        $credentials = request(['login','password']);

        if (!Auth::attempt($credentials)){
            throw new ApiException(401,'Авторизация не удалась');
        }

        $user = Auth::user();
        $user->api_token = Hash::make(microtime(true)*1000);
        $user->save();

        return response()->json($user->api_token)->setStatusCode(202, 'ок');
    }
    public function logout(Request $request){
        $user = $request->user();
        $user->api_token = null;
        $user->save();
        return response()->json('Выход')->setStatusCode(202, 'ок');
    }
}
