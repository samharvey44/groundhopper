<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\HasBadge;

class Country extends Model
{
    use HasBadge;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'order',
    ];

    /**
     * The teams in this country.
     * 
     * @return HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'country_id');
    }

    /**
     * The continent this country is from.
     * 
     * @return BelongsTo
     */
    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class, 'continent_id');
    }
}
