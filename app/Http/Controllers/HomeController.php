<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Return the home view.
     * 
     * @return Response
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Authed/Home');
    }
}
