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
        Schema::create('mentions_tags', function (Blueprint $table) {
            $table->id();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedBigInteger('user_from_id')->nullable();
            $table->foreign('user_from_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('user_to_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_to_id')->nullable();
            $table->foreign('user_to_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('mention_or_tag', ['mention', 'tag']);
            // $table->string('mention_or_tag_content)');  //I think we can get it from <<user_to_id>>
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
    //     Schema::dropIfExists('mentions_tags');
    // }
};
