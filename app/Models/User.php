<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relations to eager load.
     * 
     * @var array<int, string>
     */
    protected $with = [
        'role',
    ];

    /**
     * Return whether this user has one of the specified roles.
     * 
     * @param string|array $role
     * 
     * @return bool
     */
    public function hasRole(string|array $role): bool
    {
        if (is_array($role)) {
            return (bool) count(array_filter($role, fn ($r) => $r === $this->role->name));
        }

        return $this->role->name === $role;
    }

    /**
     * This user's role.
     * 
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * The visits this user has logged.
     * 
     * @return HasMany
     */
    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class, 'user_id');
    }

    /**
     * This user's profile.
     * 
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id');
    }
}
