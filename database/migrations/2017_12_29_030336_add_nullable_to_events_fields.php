<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//use DB;
class AddNullableToEventsFields extends Migration
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
            DB::statement('ALTER TABLE `events` CHANGE `start_date` `start_date` INT(15) NULL DEFAULT NULL');
            DB::statement('ALTER TABLE `events` CHANGE `end_date` `end_date` INT(15) NULL DEFAULT NULL');
           /* $table->date('start_date')->nullable()->change();
            $table->date('end_date')->nullable()->change();*/
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
