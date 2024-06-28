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
        $ongoing = $ongoing->sortBy('status')->take(3);

        return view('user.dashboard')->with([
            'orders' => $orders->take(10),
            'ongoing' => $ongoing,
            'numOfPages' => $orders->count()
        ]);
    }

    public function orders($username)
    {
        $user = User::all()->where('username', '=', $username)->first();


        $orders = Order::all();
        $orders = $orders->where('user_id', '=', $user->id);


        $page = \Illuminate\Support\Facades\Request::input('page');
        $count = $orders->count();


        if ($count > 20){
            try {
                if ($page < 1)
                    return redirect()->route('orders',[
                        'page'=> 1,
                        'username' => $username
                    ]);
                if (($page * 20) > $count){
                    return redirect()->route('orders',[
                        'page'=> $count/20,
                        'username' => $username
                    ]);
                }
            } catch (\TypeError $e){
                return view('errors.404');
            }
            return view('user.orders')->with([
                'orders' => $orders->forPage($page,20),
                'numOfPages' => $count/20
            ]);
        }
        return view('user.orders')->with([
            'orders' => $orders->forPage($page,20),
            'numOfPages' => 0
        ]);
    }



    public function profile($username)
    {
        $user = User::all()->where('username', '=', $username)->first();
        if (empty($user))
            return view('errors.404');
        return view('user.profile')->with('userData',$user);
    }


    public function edit()
    {
        return view('user.edit');
    }
}
