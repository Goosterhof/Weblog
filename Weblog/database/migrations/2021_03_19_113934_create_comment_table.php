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

        $table->foreignId('user_id');
        $table->foreignId('post_id')->onDelete('cascade');

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
