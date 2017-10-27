<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_team', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->index();
            $table->integer('team_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete("cascade");
            $table->foreign('event_id')->references('id')->on('events')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_team');
    }
}
