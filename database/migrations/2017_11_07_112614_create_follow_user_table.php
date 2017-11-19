<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_user', function (Blueprint $table) {
            $table->integer('follow_userid')->unsigned();
            $table->integer('followed_userid')->unsigned();
            $table->primary(['follow_userid', 'followed_userid']);
            $table->dateTime('follow_time');
            $table->foreign('follow_userid')->references('userid')->on('user');
            $table->foreign('followed_userid')->references('userid')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_user');
    }
}
