<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class CompetitionType extends Model
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
    public function competition(): HasMany
    {
        return $this->hasMany(Competition::class, 'competition_type_id');
    }
}
