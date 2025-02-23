<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Notifications\HardcodedNotification;
use App\Http\Controllers\NotificationController;


Route::get('/', [SaleController::class, 'index'])->name('home');

// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('test-notify', function () { });

Route::delete('/notifications/{id}', [NotificationController::class, 'read'])->name('notifications.read');
Route::resource('sales', SaleController::class);

// Rutas protegidas (solo para usuarios autentificados)
Route::middleware('auth')->group(function () {
    Route::resource('sales', SaleController::class);
    Route::get('mis-anuncios', [SaleController::class, 'mine'])->name('sales.mine');
    Route::resource('categories', CategoryController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('images', ImageController::class);
    Route::get('/images/{id}', [ImageController::class, 'show'])->name('images.show');
    Route::post('sales/{id}/sell/{buyer}', [SaleController::class, 'sell'])->name('sales.sell');
    Route::get('notificaciones', function () {
        return view('notifications.index');
    })->name('notifications.index');
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');
});