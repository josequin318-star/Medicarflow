<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {return view('welcome');});

Route::get('/login', [AuthController::class,'showLogin'])->name('login');

Route::post('/login', [AuthController::class,'login']);

Route::get('/logout', [AuthController::class,'logout']);

Route::get('/dashboard', function () {

    if(!session()->has('user_id')){
        return redirect('/login');
    }

    return view('dashboard');

});
