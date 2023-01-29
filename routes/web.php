<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

Route::middleware('throttle:60,1')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Unauthed Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('guest')->group(function () {
        Route::prefix('/signup')->group(function () {
            Route::get('/', [SignupController::class, 'index'])->name('signup');
            Route::post('/', [SignupController::class, 'signup']);
        });

        Route::prefix('/login')->group(function () {
            Route::get('/', [LoginController::class, 'index'])->name('login');
            Route::post('/', [LoginController::class, 'login']);
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Authed Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::post('/logout', LogoutController::class);

        Route::prefix('/home')->group(function () {
            Route::get('/', HomeController::class)->name('home');
        });

        Route::prefix('/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('profile');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('/admin')->name('admin.')->middleware('auth.admin')->group(function () {
        Route::get('/', AdminHomeController::class)->name('home');
    });

    /*
    |--------------------------------------------------------------------------
    | Fallback Redirects
    |--------------------------------------------------------------------------
    */
    Route::get('/', function () {
        return redirect()->route(Auth::check() ? 'home' : 'login');
    });

    Route::any('{query}', function () {
        abort_if(Auth::check(), 404);

        return redirect()->route('login');
    })->where('query', '.*');
});
