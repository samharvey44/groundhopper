<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;

use Database\Seeders\RoleSeeder;
use Tests\TestCase;

use Auth;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Set up this test class.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }

    /**
     * Test that an unauthenticated user can view the login page.
     *
     * @return void
     */
    public function test_unauthenticated_user_can_view_login(): void
    {
        $this->get(route('login'))
            ->assertStatus(200)
            ->assertInertia(fn (AssertableInertia $page) => $page->component('Unauthed/Login', false));
    }

    /**
     * Test that an authenticated user cannot view the login page.
     *
     * @return void
     */
    public function test_authenticated_user_cannot_view_login(): void
    {
        Auth::login($this->createTestUser());

        $this->get(route('login'))
            ->assertStatus(302)
            ->assertRedirect('home');
    }

    /**
     * Test that invalid credentials return an error.
     * 
     * @return void
     */
    public function test_invalid_credentials_fail_to_login(): void
    {
        $credentials = [
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'rememberMe' => $this->faker->boolean(),
        ];

        $this->post('/login', $credentials)
            ->assertStatus(302)
            ->assertRedirect(session()->previousUrl())
            ->assertSessionHasErrors('credentials');

        $this->assertGuest();
    }

    /**
     * Test that valid credentials login successfully.
     * 
     * @return void
     */
    public function test_valid_credentials_login_successfully(): void
    {
        $user = $this->createTestUser();

        $credentials = [
            'email' => $user->email,
            'password' => 'password',
            'rememberMe' => $this->faker->boolean(),
        ];

        $this->post('/login', $credentials)
            ->assertStatus(302)
            ->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }
}
