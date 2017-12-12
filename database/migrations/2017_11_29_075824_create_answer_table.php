<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author', 255);
            $table->string('email')->default();
            $table->integer('category_id')->unsigned();
            $table->string('question', 255);
            $table->boolean('boolean')->default(0);
            $table->text('answer')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('CategoryTableSeeder');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_answers');
    }
}
