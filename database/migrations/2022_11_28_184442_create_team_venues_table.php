<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Team;
use App\Models\Venue;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_venues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('moved_in')->nullable();
            $table->date('moved_out')->nullable();
            $table->boolean('is_current');

            $table->foreignIdFor(Team::class);
            $table->foreignIdFor(Venue::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_venues');
    }
};
