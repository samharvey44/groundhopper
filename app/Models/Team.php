<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
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
     * This team's badge.
     *
     * @return MorphOne
     */
    public function badge(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
