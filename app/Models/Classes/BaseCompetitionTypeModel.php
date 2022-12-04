<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

abstract class BaseCompetitionTypeModel extends Model
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
}
