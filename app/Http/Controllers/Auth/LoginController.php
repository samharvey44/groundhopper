<?php

namespace App\Http\Controllers\Auth;

use Inertia\Response;
use Inertia\Inertia;

use App\Http\Controllers\Controller;

class LoginController extends Controller {
    /**
     * Return the login page.
     * 
     * @return Response
     */
    public function index(): Response {
        return Inertia::render('Login');
    }
}
