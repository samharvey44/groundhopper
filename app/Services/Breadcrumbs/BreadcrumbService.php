<?php

namespace App\Services\Breadcrumbs;

use Request;

class BreadcrumbService
{
    /**
     * Generate a breadcrumb partition.
     * 
     * @param string $displayName The display name of the breadcrumb.
     * @param string $url The url for this breadcrumb to link to.
     * @param bool $activePage Whether this breadcrumb is denoting the active page.
     * 
     * @return array The breadcrumb partition.
     */
    private static function breadcrumbPartition(
        string $displayName,
        string $url,
        bool $activePage = false
    ): array {
        return [
            'name' => $displayName,
            'url' => $url,
            'isActive' => $activePage,
        ];
    }

    /**
     * The breadcrumb trails.
     * 
     * @return array The array of breadcrumb trails.
     */
    private static function breadcrumbs(): array
    {
        return [
            'home' => [
                self::breadcrumbPartition('Home', route('home', Request::route()->parameters()), true),
            ],
        ];
    }

    /**
     * Get the breadcrumbs for the given route url.
     * 
     * @param string $routeUrl The route to obtain breadcrumbs for.
     * 
     * @return array The breadcrumbs for the given route.
     */
    public static function getBreadcrumbsFor(string $routeUrl): array
    {
        return self::breadcrumbs()[$routeUrl] ?? [];
    }
}
