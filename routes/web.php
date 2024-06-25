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
        Route::middleware(\App\Http\Middleware\UserActions::class)->group(function (){
            Route::resource('orders','OrderController')->except(['index','show']);
            Route::get('/dashboard','Auth\UserController@home')->name('home');
            Route::get('/{username}/profile','Auth\UserController@profile')->name('profile');
        });
        Route::resource('orders','OrderController')->only(['index','show']);

        Route::resource('deliver','DeliverController')->except(['create', 'store', 'edit'])->middleware(\App\Http\Middleware\DriverActions::class);
        Route::post('deliver/{order}/add', 'DeliverController@store')->name('deliver.store')->middleware(\App\Http\Middleware\DriverActions::class);
    });

    Route::middleware('guest')->namespace('Auth')->group(function (){
        Route::get('login', 'LoginController@showLogin');
        Route::post('login', 'LoginController@login')->name('login');
    });
});
