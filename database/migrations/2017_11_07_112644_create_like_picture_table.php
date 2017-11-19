<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_picture', function (Blueprint $table) {
            $table->integer('userid')->unsigned();
            $table->integer('pictureid')->unsigned();
            $table->primary(['userid', 'pictureid']);
            $table->dateTime('like_time');
            $table->foreign('userid')->references('userid')->on('user');
            $table->foreign('pictureid')->references('pictureid')->on('picture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_picture');
    }
}
