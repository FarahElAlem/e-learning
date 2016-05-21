<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers',function(Blueprint $table){
          $table->increments('id');
          $table->integer('quize_id')->unsigned();
          $table->foreign('quize_id')->references('id')->on('quizes')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->string('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers');
    }
}
