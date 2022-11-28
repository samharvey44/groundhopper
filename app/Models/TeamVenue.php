<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class TeamVenue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'moved_in',
        'moved_out',
        'is_current',
    ];

    /**
     * The attributes that are dates.
     * 
     * @var array<int, string>
     */
    protected $dates = [
        'moved_in',
        'moved_out',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'is_current' => 'boolean',
    ];

    /**
     * The team associated to the venue.
     * 
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * The venue associated to the team.
     * 
     * @return BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
