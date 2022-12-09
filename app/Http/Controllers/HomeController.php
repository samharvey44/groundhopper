<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

use App\Actions\Home\HomeAction;

class HomeController extends Controller
{
    /**
     * Return the home view.
     * 
     * @return Response
     */
    public function __invoke(Request $request, HomeAction $action): Response
    {
        return Inertia::render('Authed/Home', $action());
    }
}
