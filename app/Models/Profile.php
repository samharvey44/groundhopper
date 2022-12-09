<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The relations to eager load.
     * 
     * @var array<int, string>
     */
    protected $with = [
        'profilePicture',
    ];

    /**
     * The team this profile supports.
     * 
     * @return BelongsTo
     */
    public function supportedTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'supported_team_id');
    }

    /**
     * The user whose profile this is.
     * 
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * This profile's profile picture.
     * 
     * @return MorphOne
     */
    public function profilePicture(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
