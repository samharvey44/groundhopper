<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

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

    /**
     * The users with this role.
     * 
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }
}