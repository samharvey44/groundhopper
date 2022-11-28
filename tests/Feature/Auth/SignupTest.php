<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;

use Database\Seeders\RoleSeeder;
use App\Models\User;
use Tests\TestCase;

use Auth;

class SignupTest extends TestCase
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
     * Test that an unauthenticated user can view the signup page.
     *
     * @return void
     */
    public function test_unauthenticated_user_can_view_signup(): void
    {
        $this->get(route('signup'))
            ->assertStatus(200)
            ->assertInertia(fn (AssertableInertia $page) => $page->component('Unauthed/Signup', false));
    }

    /**
     * Test that an authenticated user cannot view the signup page.
     *
     * @return void
     */
    public function test_authenticated_user_cannot_view_signup(): void
    {
        Auth::login($this->createTestUser());

        $this->get(route('signup'))
            ->assertStatus(302)
            ->assertRedirect('home');
    }

    /**
     * Test that a valid signup request succeeds.
     *
     * @return void
     */
    public function test_valid_signup_succeeds(): void
    {
        $password = $this->faker->password(8);
        $email = $this->faker->safeEmail();

        $credentials = [
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $this->post('/signup', $credentials)
            ->assertStatus(302)
            ->assertRedirect(route('home'));

        $this->assertAuthenticatedAs(User::where('email', $email)->firstOrFail());
    }

    /**
     * Test that an invalid signup request fails.
     *
     * @return void
     */
    public function test_invalid_signup_fails(): void
    {
        $password = $this->faker->password(1, 7);

        $credentials = [
            'email' => 'test12345',
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $this->post('/signup', $credentials)
            ->assertStatus(302)
            ->assertSessionHasErrors(['email', 'password']);

        $this->assertGuest();
    }
}
