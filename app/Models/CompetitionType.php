<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class CompetitionType extends Model
{
    /**
     * The league competition type.
     */
    public const LEAGUE = 'League';

    /**
     * The cup competition type.
     */
    public const CUP = 'Cup';

    /**
     * The international competition type.
     */
    public const INTERNATIONAL = 'International';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The competitions of this type.
     * 
     * @return HasMany
     */
    public function competitions(): HasMany
    {
        return $this->hasMany(Competition::class, 'competition_type_id');
    }
}
