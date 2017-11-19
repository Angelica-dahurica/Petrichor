<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->increments('activityid');
            $table->integer('activity_creator')->unsigned();
            $table->string('activity_name');
            $table->double('activity_fee');
            $table->binary('activity_description');
            $table->string('activity_location');
            $table->dateTime('activity_time');
            $table->integer('activity_limitnum');
            $table->foreign('activity_creator')->references('userid')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity');
    }
}
