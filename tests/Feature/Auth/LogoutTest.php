<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Database\Seeders\RoleSeeder;
use Tests\TestCase;

use Auth;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

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
     * Test that an authorized user can logout.
     * 
     * @return void
     */
    public function test_an_authed_user_can_logout(): void
    {
        Auth::login($this->createTestUser());

        $oldToken = session()->token();
        $oldSessionId = session()->getId();

        $this->post('/logout')->assertStatus(200);

        $this->assertGuest();

        $this->assertNotTrue($oldToken === session()->token());
        $this->assertNotTrue($oldSessionId === session()->getId());
    }
}
