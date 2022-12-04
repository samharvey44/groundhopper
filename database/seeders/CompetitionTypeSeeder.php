<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CompetitionType;

class CompetitionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            CompetitionType::LEAGUE,
            CompetitionType::CUP,
            CompetitionType::INTERNATIONAL,
        ] as $competitionTypeName) {
            CompetitionType::create(['name' => $competitionTypeName]);
        }
    }
}
