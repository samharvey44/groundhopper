<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

use App\Models\Image;

trait HasBadge
{
    /**
     * This model's badge.
     *
     * @return MorphOne
     */
    public function badge(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
