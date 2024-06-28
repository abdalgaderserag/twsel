<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    private function userName($name)
    {
        $username = Str::slug($name);
        if ((DB::table('users')->where('username','=',$username)->exists())){
            $username = $username . "_" . Str::lower(Str::random(1));
            $this->userName($username);
        }
        return $username;
    }
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User($request->except(['_token','password']));
        $username = Str::slug($user->name);
        $user['username'] = $this->userName($username);
        $user['password'] = Hash::make($request->password);
        $user['type'] = 1;
        $user->save();
        return redirect()->route('login');
    }
}
