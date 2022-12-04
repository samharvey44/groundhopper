<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Classes\BaseCompetitionTypeModel;

class CompetitionType extends BaseCompetitionTypeModel
{
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
