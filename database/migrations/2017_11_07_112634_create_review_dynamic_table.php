<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewDynamicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_dynamic', function (Blueprint $table) {
            $table->increments('reviewid');
            $table->integer('dynamicid')->unsigned();
            $table->integer('review_userid')->unsigned();
            $table->integer('reviewed_userid')->unsigned();
            $table->text('review_content');
            $table->dateTime('review_time');
            $table->foreign('dynamicid')->references('dynamicid')->on('dynamic');
            $table->foreign('review_userid')->references('userid')->on('user');
            $table->foreign('reviewed_userid')->references('userid')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_dynamic');
    }
}
