<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToEventsTable extends Migration
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
            if(Schema::hasColumn('events','status')){
                Schema::table('events', function (Blueprint $table) {
                    //
                    $table->dropColumn('status');
                });
            }

            $table->enum('status',['review','open','closed','concluded']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('events','status')){
            Schema::table('events', function (Blueprint $table) {
                //
                $table->dropColumn('status');
            });
        }

    }
}
