<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;

use Tests\Traits\SeedsRoles;
use App\Models\Role;
use Tests\TestCase;

use Auth;

class AdminHomeTest extends TestCase
{
    use RefreshDatabase;
    use SeedsRoles;
    use WithFaker;

    /**
     * Test that an admin user can view the admin homescreen, and that it has the right data.
     * 
     * @return void
     */
    public function test_admin_user_can_view_admin_homescreen(): void
    {
        foreach ([
            $this->createTestUser(Role::SUPER_ADMIN),
            $this->createTestUser(Role::ADMIN),
        ] as $user) {
            Auth::login($user);

            $this->get(route('admin.home'))
                ->assertStatus(200)
                ->assertInertia(function (AssertableInertia $page) {
                    $page->component('Authed/Admin/Home', false)->hasBreadcrumbsFor('admin.home');
                });

            // TODO assert correct data returned
        }
    }

    /**
     * Test that a non-admin user cannot view the admin homescreen.
     * 
     * @return void
     */
    public function test_non_admin_user_cannot_view_admin_homescreen(): void
    {
        Auth::login($this->createTestUser());

        $this->get(route('admin.home'))->assertStatus(403);
    }
}
