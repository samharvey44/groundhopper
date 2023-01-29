<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

use App\Actions\Admin\AdminHomeAction;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    /**
     * Return the admin home view.
     * 
     * @return Response
     */
    public function __invoke(Request $request, AdminHomeAction $action): Response
    {
        return Inertia::render('Authed/Admin/Home', $action());
    }
}
