<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attend_activity', function (Blueprint $table) {
            $table->integer('userid')->unsigned();
            $table->integer('activityid')->unsigned();
            $table->primary(['userid', 'activityid']);
            $table->dateTime('attend_time');
            $table->foreign('userid')->references('userid')->on('user');
            $table->foreign('activityid')->references('activityid')->on('activity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attend_activity');
    }
}
