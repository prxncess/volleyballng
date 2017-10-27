<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhonePasswordToTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            //
            //$table->string('phone',11)->nullable();
           // $table->string('passkey',50)->nullable();
        });
        Schema::table('events', function (Blueprint $table) {
            //
           // $table->enum('status',['review','open','closed','concluded']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            //
            //$table->dropColumn('phone');
            //$table->dropColumn('passkey');
        });
        Schema::table('events', function (Blueprint $table) {
            //
          //  $table->dropColumn('status');
        });
    }
}
