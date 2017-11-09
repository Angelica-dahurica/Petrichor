<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDynamicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic', function (Blueprint $table) {
            $table->increments('dynamicid');
            $table->integer('dynamic_creator')->unsigned();
            $table->string('dynamic_type');
            $table->integer('dynamic_repost');
            $table->integer('dynamic_like');
            $table->binary('dynamic_content');
            $table->dateTime('dynamic_publishtime');
            $table->string('dynamic_tags');
            $table->foreign('dynamic_creator')->references('userid')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dynamic');
    }
}
