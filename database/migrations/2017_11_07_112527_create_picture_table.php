<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture', function (Blueprint $table) {
            $table->increments('pictureid');
            $table->integer('picture_album')->unsigned();
            $table->string('picture_name');
            $table->text('picture_description')->nullable();
            $table->string('picture_content');
            $table->dateTime('picture_publishtime');
            $table->string('picture_tags');
            $table->foreign('picture_album')->references('albumid')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picture');
    }
}
