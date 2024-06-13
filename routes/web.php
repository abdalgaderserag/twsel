<?php

use Illuminate\Support\Facades\Route;
//testing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/log/{id}', function ($id){
    \Illuminate\Support\Facades\Auth::logout();
    \Illuminate\Support\Facades\Auth::loginUsingId($id);
    return \Illuminate\Support\Facades\Auth::user();
});

Route::namespace('App\Http\Controllers')->group(function (){
    Route::middleware('auth')->group(function (){
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');

        Route::resource('orders','OrderController');
        Route::resource('deliver','DeliverController')->except(['create', 'store', 'edit']);
        Route::get('deliver/{order}', 'DeliverController@store')->name('deliver.store');
    });

    Route::middleware('guest')->namespace('Auth')->group(function (){
        Route::get('login', 'LoginController@showLogin');
        Route::post('login', 'LoginController@login')->name('login');
    });
});
