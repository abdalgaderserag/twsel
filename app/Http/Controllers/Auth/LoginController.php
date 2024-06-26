<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::all()->where('username', '=', $request['username'])->first();
        if(empty($user)){
            $user = User::all()->where('email', '=', $request['username'])->first();
        }
//        return $user;
        if (empty($user)){
            return response('wrong authentication data',400);
        }
        if (Hash::check($request['password'], $user['password'])){
            Auth::login($user);
            return redirect()->route('orders.index');
        }
        return redirect()->back()->with('error','wrong password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
