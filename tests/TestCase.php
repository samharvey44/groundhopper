<?php

namespace Tests;

use App\Models\Profile;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use App\Models\Role;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create a test user.
     * 
     * @param string $role The role to give the created user.
     * 
     * @return User
     */
    public function createTestUser(string $role = Role::USER): User
    {
        $user = User::factory()->make();

        $user->role()->associate(Role::firstWhere('name', $role));
        $user->save();

        $profile = Profile::factory()->make();

        $profile->user()->associate($user);
        $profile->save();

        return $user;
    }
}
