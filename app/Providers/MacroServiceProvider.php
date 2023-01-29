<?php

namespace App\Providers;

use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Assert as PHPUnit;
use Illuminate\Support\ServiceProvider;

use App\Services\Breadcrumbs\BreadcrumbService;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        AssertableJson::macro('hasBreadcrumbsFor', function (string $route) {
            $matchingBreadcrumbs = BreadcrumbService::getBreadcrumbsFor($route);

            if (!(bool) count($matchingBreadcrumbs)) {
                PHPUnit::assertTrue(true);
            }

            try {
                foreach ($matchingBreadcrumbs as $breadcrumbKey => $breadcrumb) {
                    foreach ($breadcrumb as $breadcrumbItemKey => $breadcrumbItem) {
                        PHPUnit::assertTrue($this->prop("breadcrumbs.{$breadcrumbKey}.{$breadcrumbItemKey}") === $breadcrumbItem);
                    }
                }
            } catch (AssertionFailedError $e) {
                PHPUnit::fail('Breadcrumbs did not match the expected values for the page.');
            }
        });
    }
}
