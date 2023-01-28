<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

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
