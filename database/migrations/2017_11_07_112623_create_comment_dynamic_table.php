<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentDynamicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_dynamic', function (Blueprint $table) {
            $table->increments('dynamicid');
            $table->integer('comment_userid')->unsigned();
            $table->text('comment_content');
            $table->dateTime('comment_time');
            $table->foreign('comment_userid')->references('userid')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_dynamic');
    }
}
