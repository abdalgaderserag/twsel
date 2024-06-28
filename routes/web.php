<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('orders.index');
});


//testing
Route::get('/log/{id}', function ($id){
    \Illuminate\Support\Facades\Auth::logout();
    \Illuminate\Support\Facades\Auth::loginUsingId($id);
    return redirect()->to('/');
});

Route::get('/test',function (){
    return view('test.log');
});


Route::namespace('App\Http\Controllers')->group(function (){
    Route::middleware('auth')->group(function (){
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('profile/edit', 'Auth\UserController@edit')->name('profile.edit');
        Route::put('profile/edit', 'Auth\UserController@save')->name('profile.save');
        Route::middleware(\App\Http\Middleware\UserActions::class)->group(function (){
            Route::resource('orders','OrderController')->except(['index','show']);
            Route::get('/dashboard','Auth\UserController@home')->name('home');
            Route::get('/{username}/orders','Auth\UserController@orders')->name('orders');
            Route::get('/{username}/profile','Auth\UserController@profile')->name('profile');
        });
        Route::resource('orders','OrderController')->only(['index','show']);

        Route::middleware(\App\Http\Middleware\DriverActions::class)->group(function (){
            Route::get('new','OrderController@newOrder')->name('new');
            Route::get('delivered','OrderController@delivered')->name('delivered');

            Route::resource('deliver','DeliverController')->except(['create', 'store', 'edit']);
            Route::get('ongoing','DeliverController@ongoing')->name('ongoing');
            Route::get('canceled','DeliverController@canceled')->name('canceled');
            Route::get('delayed','DeliverController@delayed')->name('delayed');
            Route::post('deliver/{order}/add', 'DeliverController@store')->name('deliver.store');
        });
    });

    Route::middleware('guest')->namespace('Auth')->group(function (){
        Route::get('login', 'LoginController@showLogin');
        Route::post('login', 'LoginController@login')->name('login');
        Route::get('register', 'RegisterController@showRegister')->name('register');
        Route::post('register', 'RegisterController@register')->name('register');
    });
});
