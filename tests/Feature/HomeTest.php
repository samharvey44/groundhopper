<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

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
    public function test_auth_user_has_correct_homescreen(): void
    {
        // TODO
    }
}
