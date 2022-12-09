<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

use App\Actions\Profile\IndexAction;

class ProfileController extends Controller
{
    /**
     * Show the profile page.
     * 
     * @param Request $request
     * 
     * @return Response
     */
    public function index(Request $request, IndexAction $action): Response
    {
        return Inertia::render('Authed/Profile', $action());
    }
}
