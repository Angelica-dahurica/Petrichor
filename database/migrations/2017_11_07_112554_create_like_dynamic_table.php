<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeDynamicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dynamic', function (Blueprint $table) {
            $table->integer('userid')->unsigned();
            $table->integer('dynamicid')->unsigned();
            $table->primary(['userid', 'dynamicid']);
            $table->dateTime('like_time');
            $table->foreign('userid')->references('userid')->on('user');
            $table->foreign('dynamicid')->references('dynamicid')->on('dynamic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_dynamic');
    }
}
