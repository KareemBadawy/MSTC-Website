<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('choice_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')
                ->onDelete('cascade');
            $table->foreign('choice_id')->references('id')->on('choices')
                ->onDelete('cascade');
            $table->timestamps();

            $table->primary(['id', 'user_id', 'question_id' , 'choice_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');
    }
}
