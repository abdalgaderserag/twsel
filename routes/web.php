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


Route::resource('orders','App\Http\Controllers\OrderController');
