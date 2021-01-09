<?php

use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', LoginController::class, 'showLoginForm');
Route::post('login', LoginController::class, 'login');


Route::view('/', 'home');
Route::view('/protected', 'protected');
