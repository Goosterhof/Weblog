<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;


class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function(Blueprint $table)
  		{
  			$table->increments('id');

        $table->string('title');
        $table->text('body');
        $table->string('slug');

        // for media
        $table->string('media_name')->onUpdate('cascade')->onDelete('cascade');
        $table->string('media_path')->onUpdate('cascade')->onDelete('cascade');

        $table->boolean('is_premium')->default(0);

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}