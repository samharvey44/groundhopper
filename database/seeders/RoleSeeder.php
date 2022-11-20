<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([Role::SUPER_ADMIN, Role::ADMIN, Role::USER] as $roleName) {
            Role::create(['name' => $roleName]);
        }
    }
}
