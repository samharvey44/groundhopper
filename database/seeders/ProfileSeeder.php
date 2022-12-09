<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Profile;
use App\Models\User;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superUser = User::where('email', config('users.super_user_email'))->firstOrFail();

        $profile = Profile::make();

        $profile->forceFill(['display_name' => 'Super Admin']);
        $profile->user()->associate($superUser);

        $profile->save();
    }
}
