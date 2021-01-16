<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LogoutController::class, '__invoke']);
    Route::view('/protected', 'protected');
});

Route::view('/', 'home');

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/users', function () {
    return new UserCollection(User::all()->keyBy->id);
});

Route::get('/us', [LogoutController::class, 'user']);
