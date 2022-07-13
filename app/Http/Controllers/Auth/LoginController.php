<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login(){
        request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $data = [
            'username' => request('username'),
            'password' => request('password')
        ];
        if(Auth::attempt($data)){
            $user = Auth::user();
            return response()->json([
                'msg' => 'Login berhasil',
                'user'=> $user
            ], 200);
        }else{
            return response()->json([
                'msg' => 'Username atau password tidak cocok'
            ],401);
        }
    }
}
