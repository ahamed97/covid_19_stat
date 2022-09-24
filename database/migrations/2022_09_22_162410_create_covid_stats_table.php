<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_stats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('local_new_cases')->nullable();
            $table->bigInteger('local_total_cases')->nullable();
            $table->bigInteger('local_deaths')->nullable();
            $table->bigInteger('local_new_deaths')->nullable();
            $table->bigInteger('local_recovered')->nullable();
            $table->bigInteger('local_active_cases')->nullable();
            $table->dateTime('update_date_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covid_stats');
    }
}
