<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToEventsOrganizersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            //
            DB::statement('ALTER TABLE `events` CHANGE `e_organizer` `e_organizer` VARCHAR(100)  NULL DEFAULT NULL, CHANGE `e_email` `e_email` VARCHAR(100) NULL DEFAULT NULL, CHANGE `e_phone` `e_phone` VARCHAR(11) NULL DEFAULT NULL, CHANGE `e_location` `e_location` VARCHAR(30)  NULL DEFAULT NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}
