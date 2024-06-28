<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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

    public function save(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $ext = $request->file('image')->guessExtension();
        if (empty($ext))
            $ext = $request->file('image')->clientExtension();
        $name = $user->id .'.'. $ext;
        $dir = '/images/profile/';
        $path =  $request->file('image')->storeAs($dir, $name);
        $user['image'] = $path;
        $user->update($request->only(['name', 'contact', 'password']));
        return redirect()->route('profile',$user->username);
    }
}
