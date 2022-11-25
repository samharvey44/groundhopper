<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Inertia\Inertia;

use App\Http\Requests\Login\LoginRequest;
use App\Http\Controllers\Controller;
use App\Actions\Login\LoginAction;

class LoginController extends Controller
{
    /**
     * Return the login page.
     * 
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Unauthed/Login');
    }

    /**
     * Handle a user login.
     * 
     * @param LoginRequest $request
     * 
     * @return RedirectResponse
     */
    public function login(LoginRequest $request, LoginAction $action): RedirectResponse
    {
        $success = $action(
            $request->get('email'),
            $request->get('password'),
            $request->get('rememberMe')
        );

        return $success
            ? redirect()->route('home')
            : redirect()->back()->withErrors(['credentials' => 'Email or password were incorrect!']);
    }
}
