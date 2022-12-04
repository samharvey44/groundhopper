<?php

namespace App\Actions\Home;

use App\Models\Competition;
use App\Models\TeamVenue;
use App\Models\Venue;

use Auth;

class ObtainHomeDataAction
{
    /**
     * Obtain data for the home screen to display.
     * 
     * @return array
     */
    public function __invoke(): array
    {
        Auth::user()->load('visits.venue');

        $englishVenuesIds = TeamVenue::whereHas('team', function ($sq) {
            $sq->whereHas('competitions', function ($ssq) {
                $ssq->whereIn('name', Competition::ENGLISH_LEAGUES);
            });
        })
            ->where('is_current', true)
            ->with('venue')
            ->get()
            ->map(fn ($tv) => $tv->venue->id)
            ->toArray();

        $userVisits = Auth::user()->visits;

        $userEnglishVenueVisits = $userVisits
            ->map(fn ($v) => $v->venue)
            ->filter(fn ($v) => in_array($v->id, $englishVenuesIds))
            ->count();

        return [
            'englishVisits' => $userEnglishVenueVisits,
            'averageVisitRating' => round($userVisits->avg('rating'), 2),
            'totalVisits' => $userVisits->count(),
        ];
    }
}
