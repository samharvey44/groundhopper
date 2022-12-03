<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'built_in',
        'demolished_in',
    ];

    /**
     * The attributes that are dates.
     * 
     * @var array <int, string>
     */
    protected $dates = [
        'built_in',
        'demolished_in',
    ];

    /**
     * The team-venue associations for this venue.
     * 
     * @return HasMany
     */
    public function teamVenues(): HasMany
    {
        return $this->hasMany(TeamVenue::class, 'venue_id');
    }

    /**
     * The picture of this venue.
     * 
     * @return MorphOne
     */
    public function picture(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * The visits at this venue.
     * 
     * @return HasMany
     */
    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class, 'venue_id');
    }
}
