<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRoleModel extends Model
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
