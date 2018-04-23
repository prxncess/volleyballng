<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrganizers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('organizer',100)->nullable();
            $table->string('email',100)->nullable()->unique();
            $table->string('phone',11)->nullable();
            $table->string('location',30)->nullable();
            $table->string('password',100)->nullable();
            $table->string('photo',100)->nullable();
            $table->integer('active')->default(1);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizers');
    }
}
