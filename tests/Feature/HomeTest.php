<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;

use Tests\Traits\SeedsRoles;
use Tests\TestCase;

use Auth;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    use SeedsRoles;
    use WithFaker;

    /**
     * Test that an authorized user can view their homescreen, and that it has the right data.
     * 
     * @return void
     */
    public function test_auth_user_can_view_homescreen(): void
    {
        Auth::login($this->createTestUser());

        $this->get(route('home'))
            ->assertStatus(200)
            ->assertInertia(function (AssertableInertia $page) {
                $page->component('Authed/Home', false)->hasBreadcrumbsFor('home');
            });

        // TODO assert correct data returned
    }
}
