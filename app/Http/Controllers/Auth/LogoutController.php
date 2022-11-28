<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Log out the user.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function __invoke(Request $request): void
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();
    }
}
