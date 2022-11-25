<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;

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
        Route::get('/', function () {
            dd('home');
        })->name('home');
    });

    /*
    |--------------------------------------------------------------------------
    | Fallback Redirects
    |--------------------------------------------------------------------------
    */

    Route::any('{query}', function () {
        abort_if(Auth::check(), 404);

        return redirect()->route('login');
    })->where('query', '.*');
});
