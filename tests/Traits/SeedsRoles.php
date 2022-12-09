<?php

namespace Tests\Traits;

use Database\Seeders\RoleSeeder;

trait SeedsRoles
{
    /**
     * Set up the test class.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }
}
