<?php

namespace App\Actions\Profile;

use App\Http\Resources\ProfileResource;

use Auth;

class MyProfileAction
{
    /**
     * Obtain data for the profile screen to display.
     * 
     * @return array
     */
    public function __invoke(): array
    {
        Auth::user()->load('profile');

        return [
            'profile' => ProfileResource::make(Auth::user()->profile),
        ];
    }
}
