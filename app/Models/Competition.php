<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
