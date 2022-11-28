<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\HasBadge;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasBadge;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'formation_date',
        'description',
        'is_international',
    ];

    /**
     * The attributes to be cast to native types.
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'is_international' => 'boolean',
    ];

    /**
     * The country this team is from.
     * 
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * The competitions this team is part of.
     * 
     * @return BelongsToMany
     */
    public function competitions(): BelongsToMany
    {
        return $this->belongsToMany(Competition::class, 'competition_teams', 'team_id', 'competition_id');
    }

    /**
     * The team-venue associations for this team.
     * 
     * @return HasMany
     */
    public function teamVenues(): HasMany
    {
        return $this->hasMany(TeamVenue::class, 'team_id');
    }
}
