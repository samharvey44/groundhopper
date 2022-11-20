<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use App\Actions\Signup\SignupAction;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

use App\Http\Requests\Signup\SignupRequest;
use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    /**
     * Return the signup page.
     * 
     * @param Request $request
     * 
     * @return Response
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Unauthed/Signup');
    }

    /**
     * Handle a user signup.
     * 
     * @param SignupRequest $request
     * 
     * @return RedirectResponse
     */
    public function signup(SignupRequest $request, SignupAction $action): RedirectResponse
    {
        $action($request->get('email'), $request->get('password'));

        return redirect()->route('home');
    }
}
