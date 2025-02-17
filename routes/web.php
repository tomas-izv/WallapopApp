<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('mainview');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UsersController::class);

Route::get('/allusers',[App\Http\Controllers\UsersController::class, 'usersView'])->name('allUsers');


Route::resource('sale', SaleController::class);

Route::resource('category', CategoryController::class);

Route::resource('setting', SettingController::class);

