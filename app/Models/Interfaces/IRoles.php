<?php

namespace App\Models\Interfaces;

interface IRoles
{
    /**
     * The super admin role.
     */
    public const SUPER_ADMIN = 'Super Admin';

    /**
     * The admin role.
     */
    public const ADMIN = 'Admin';

    /**
     * The user role.
     */
    public const USER = 'User';
}
