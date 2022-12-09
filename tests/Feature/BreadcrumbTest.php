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
    public function test_breadcrumbs_generate_for_defined_page()
    {
        // TODO

        // Auth::login($this->createTestUser());

        // $this->get(route('profile'))
        //     ->assertStatus(200)
        //     ->assertInertia(function (AssertableInertia $page) {
        //         return $page->component('Authed/Profile', false)
        //             ->has('breadcrumbs');
        //     });
    }
}
