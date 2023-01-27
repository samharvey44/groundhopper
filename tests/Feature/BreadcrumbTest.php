<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia;

use Tests\Traits\SeedsRoles;
use Tests\TestCase;

use Auth;

class BreadcrumbTest extends TestCase
{
    use SeedsRoles;

    /**
     * Test that breadcrumbs generate correctly for a page with them defined.
     *
     * @return void
     */
    public function test_breadcrumbs_generate_correctly()
    {
        Auth::login($this->createTestUser());

        $this->get(route('profile'))
            ->assertStatus(200)
            ->assertInertia(function (AssertableInertia $page) {
                return $page->component('Authed/Profile', false)
                    ->where('breadcrumbs.0.name', 'Home')
                    ->where('breadcrumbs.0.url', route('home'))
                    ->where('breadcrumbs.0.isActive', false)
                    ->where('breadcrumbs.1.name', 'Profile')
                    ->where('breadcrumbs.1.url', route('profile'))
                    ->where('breadcrumbs.1.isActive', true);
            });
    }
}
