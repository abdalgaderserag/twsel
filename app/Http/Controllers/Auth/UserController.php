<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $orders = Order::all();
        $orders = $orders->where('user_id', '=', Auth::id());
        $ongoing = $orders->filter(function (Order $o){
            return ($o['status'] === 2 || $o['status'] === 3);
        });
        return view('user.dashboard')->with([
            'orders' => $orders,
            'ongoing' => $ongoing,
        ]);
    }

    public function profile($username)
    {
        $user = User::all()->where('username', '=', $username)->first();
        if (empty($user))
            return view('error.userNotFound');
        return view('user.profile')->with('userData',$user);
    }
}
