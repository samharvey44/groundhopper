<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Classes\BaseRoleModel;

class Role extends BaseRoleModel
{
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
