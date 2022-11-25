<?php

namespace App\Actions\Login;

class LoginAction
{
    /**
     * Execute the login action.
     * 
     * @param string $email
     * @param string $password
     * 
     * @return bool
     */
    public function __invoke(string $email, string $password, bool $rememberMe): bool
    {
        return auth()->attempt(['email' => $email, 'password' => $password], $rememberMe);
    }
}
