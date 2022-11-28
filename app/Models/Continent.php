<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\HasBadge;

class Continent extends Model
{
    use HasBadge;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The countries in this continent.
     * 
     * @return HasMany
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'continent_id');
    }

    /**
     * The teams in this continent.
     * 
     * @return HasManyThrough
     */
    public function teams(): HasManyThrough
    {
        return $this->hasManyThrough(Team::class, Country::class, 'continent_id', 'country_id');
    }
}
