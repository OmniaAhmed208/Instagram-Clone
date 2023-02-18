<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            // $table->foreign('comment_writer_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('comment_writer_id')->nullable();
            $table->foreign('comment_writer_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('comment_content');
            $table->timestamps();
            // $table->unique(['post_id', 'comment_writer_id', 'comment_content']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('comments');
    // }
};
