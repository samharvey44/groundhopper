<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\HasBadge;

class Competition extends Model
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
}
