<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusForEventsTable extends Migration
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
                $table->dropColumn([
                    'status'
                ]);
            }
            $table->enum('status' , array('pending','open','concluded','closed','new','review'))->default('new');
            //$table->enum('choices', array('foo', 'bar'));
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
