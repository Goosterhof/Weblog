<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema :: enableForeignKeyConstraints ();
      Schema::create('comments', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        $table->foreignId('post_id')->onUpdate('cascade');;

        $table->text('title');
        $table->text('body');


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
        Schema::dropIfExists('comments');
    }
}
