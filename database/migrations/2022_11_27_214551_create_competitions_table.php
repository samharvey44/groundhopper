<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\CompetitionType;
use App\Models\Continent;
use App\Models\Country;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->smallInteger('order');

            $table->foreignIdFor(Country::class)->nullable();
            $table->foreignIdFor(Continent::class)->nullable();

            $table->foreignIdFor(CompetitionType::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
};
