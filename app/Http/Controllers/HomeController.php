<?php

namespace App\Http\Controllers;

use App\Actions\Home\ObtainHomeDataAction;
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
    public function __invoke(Request $request, ObtainHomeDataAction $action): Response
    {
        return Inertia::render('Authed/Home', $action());
    }
}
