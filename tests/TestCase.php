<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use App\Models\Role;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create a test user.
     * 
     * @return User
     */
    public function createTestUser(): User
    {
        $user = User::factory()->make();

        $user->role()->associate(Role::where('name', Role::USER)->first());
        $user->save();

        return $user;
    }
}
