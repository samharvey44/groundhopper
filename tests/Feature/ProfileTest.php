<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;

use Tests\Traits\SeedsRoles;
use Tests\TestCase;

use Auth;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    use SeedsRoles;
    use WithFaker;

    /**
     * Test that an authorized user can view their profile, and that it has the right data.
     * 
     * @return void
     */
    public function test_auth_user_can_view_profile(): void
    {
        Auth::login($this->createTestUser());

        $this->get(route('profile'))
            ->assertStatus(200)
            ->assertInertia(function (AssertableInertia $page) {
                return $page->component('Authed/Profile', false)->hasBreadcrumbsFor('profile');
            });

        // TODO assert correct data returned
    }
}
