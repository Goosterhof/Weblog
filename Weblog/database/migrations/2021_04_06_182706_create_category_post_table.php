<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('category_id')->unsigned();
          $table->integer('post_id')->unsigned();

          $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
          $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
