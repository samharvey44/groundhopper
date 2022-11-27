<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::make(['email' => config('users.super_user_email')]);

        $user->forceFill(['password' => Hash::make(config('users.super_user_password'))]);
        $user->role()->associate(Role::firstWhere('name', Role::SUPER_ADMIN));

        $user->save();
    }
}
