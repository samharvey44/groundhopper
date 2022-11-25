<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;

use Database\Seeders\RoleSeeder;
use App\Models\User;
use App\Models\Role;
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
        $this->get(route('signup.show'))
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
        $this->seed(RoleSeeder::class);

        $user = User::factory()->make();
        $user->role()->associate(Role::where('name', Role::USER)->first());
        $user->save();

        Auth::login($user);

        $this->get(route('signup.show'))
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

        $credentials = [
            'email' => $this->faker->safeEmail(),
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $this->post('/signup', $credentials)
            ->assertStatus(302)
            ->assertRedirect(route('home'));

        $this->assertTrue(auth()->check());
    }

    /**
     * Test that an invalid signup request fails.
     *
     * @return void
     */
    public function test_invalid_signup_fails(): void
    {
        /**
         * Test an invalid password.
         */

        $password = $this->faker->password(1, 7);

        $credentials = [
            'email' => $this->faker->safeEmail(),
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $this->post('/signup', $credentials)
            ->assertStatus(302)
            ->assertSessionHasErrors('password');

        $this->assertFalse(auth()->check());

        /**
         * Test an invalid email.
         */

        $password = $this->faker->password(8);

        $credentials = [
            'email' => 'test12345',
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $this->post('/signup', $credentials)
            ->assertStatus(302)
            ->assertSessionHasErrors('email');

        $this->assertFalse(auth()->check());
    }
}
