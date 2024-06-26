<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User($request->except(['_token','password']));
        $user['username'] = stripcslashes($user->name);
        $user['password'] = Hash::make($request->password);
        $user['type'] = 1;
        $user->save();
        return redirect()->route('login');
    }
}
