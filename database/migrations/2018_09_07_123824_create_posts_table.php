<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inner_id');
            $table->integer('thread_id');
            $table->string('name');
            $table->text('comment');
            $table->text('author_hash');
            $table->text('password');
            $table->text('ip_addr');
            $table->timestamps();

            $table->unique(['thread_id', 'inner_id']);
            $table->foreign('thread_id')->references('id')->on('threads');
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
