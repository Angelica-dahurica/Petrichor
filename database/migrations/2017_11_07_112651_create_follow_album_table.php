<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_album', function (Blueprint $table) {
            $table->integer('userid')->unsigned();
            $table->integer('albumid')->unsigned();
            $table->primary(['userid', 'albumid']);
            $table->dateTime('follow_time');
            $table->foreign('userid')->references('userid')->on('user');
            $table->foreign('albumid')->references('albumid')->on('album');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_album');
    }
}
