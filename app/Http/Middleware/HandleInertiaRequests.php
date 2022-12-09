<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Tightenco\Ziggy\Ziggy;
use Inertia\Middleware;

use App\Services\Breadcrumbs\BreadcrumbService;
use App\Http\Resources\UserResource;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed[]
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'breadcrumbs' => fn () => BreadcrumbService::getBreadcrumbsFor($request->route()->getName()),
            'successMessage' => fn () => $request->session()->get('successMessage'),

            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },

            'auth' => [
                'user' => !is_null($request->user()) ? UserResource::make($request->user()) : null,
            ],
        ]);
    }
}
