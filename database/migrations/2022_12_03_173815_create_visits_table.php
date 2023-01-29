<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Competition;
use App\Models\Venue;
use App\Models\Team;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('visited_on')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('rating')->nullable();

            $table->foreignIdFor(Team::class, 'home_team_id')->constrained('teams');
            $table->foreignIdFor(Team::class, 'away_team_id')->constrained('teams');

            $table->foreignIdFor(Competition::class)->constrained();
            $table->foreignIdFor(Venue::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
};
