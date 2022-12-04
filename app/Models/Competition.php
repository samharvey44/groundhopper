<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\HasBadge;

class Competition extends Model
{
    use HasBadge;

    /**
     * The English leagues.
     */
    public const ENGLISH_LEAGUES = [
        'Premier League',
        'Championship',
        'League One',
        'League Two',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'order',
        'active',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * The type of this competition.
     * 
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(CompetitionType::class, 'competition_type_id');
    }

    /**
     * The teams in this competition.
     * 
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'competition_teams', 'competition_id', 'team_id');
    }

    /**
     * The country this competition is within.
     * 
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * The continent this competition is within.
     * 
     * @return BelongsTo
     */
    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class, 'country_id');
    }

    /**
     * The visits for this competition.
     * 
     * @return HasMany
     */
    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class, 'competition_id');
    }
}
