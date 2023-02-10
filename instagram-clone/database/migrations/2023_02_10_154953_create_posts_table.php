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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreign('post_creator_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('post_url', 500);
            $table->text('caption')->nullable();
            $table->foreign('media_id')
                ->references('id')->on('media')
                ->onDelete('cascade')->nullable();
            $table->foreign('mention_tag_id')
                ->references('id')->on('mentions_tags')
                ->onDelete('cascade')->nullable();
            $table->string('address_address')->nullable();  // google maps api : https://laraveldaily.com/post/laravel-find-addresses-with-coordinates-via-google-maps-api
            $table->double('address_latitude')->nullable();
            $table->double('address_longitude')->nullable();
            $table->boolean('likes_counts_settings')->default(0);
            $table->boolean('comments_settings')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('posts');
    // }
};
