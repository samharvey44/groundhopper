<?php

namespace App\Actions\Signup;

use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use App\Models\User;

class SignupAction
{
    /**
     * Execute the signup action.
     * 
     * @param string $email
     * @param string $password
     * 
     * @return void
     */
    public function __invoke(string $email, string $password): void
    {
        $user = User::make([
            'email' => $email,
        ]);

        $user->forceFill(['password' => Hash::make($password)]);
        $user->role()->associate(Role::firstWhere('name', Role::USER));

        $user->save();

        auth()->login($user);
    }
}
