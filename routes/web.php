<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:60,1')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Unauthed Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login.show');
    });

    /*
    |--------------------------------------------------------------------------
    | Authed Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth')->group(function () {
    });

    /*
    |--------------------------------------------------------------------------
    | Fallback Redirects
    |--------------------------------------------------------------------------
    */

    Route::get('/', function () {
        return Auth::check() ? redirect()->route('home') : redirect()->route('login.show');
    });

    Route::any('{query}', function () {
        abort_if(Auth::check(), 404);

        return redirect()->route('login.show');
    })->where('query', '.*');
});
