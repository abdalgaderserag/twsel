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

Route::namespace('App\Http\Controllers\Auth')->group(function (){
    Route::middleware('auth')->group(function (){
        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    Route::middleware('guest')->group(function (){
        Route::get('login', 'LoginController@showLogin');
        Route::post('login', 'LoginController@login')->name('login');
    });
});


Route::resource('orders','App\Http\Controllers\OrderController');
