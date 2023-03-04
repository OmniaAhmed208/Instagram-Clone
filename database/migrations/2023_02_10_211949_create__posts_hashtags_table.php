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
        Schema::create('_posts_hashtags', function (Blueprint $table) {
            $table->id();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            // $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
            $table->unsignedBigInteger('hashtag_id')->nullable();
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');

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
        Schema::dropIfExists('_posts_hashtags');
    }
};
