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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            // $table->unsignedBigInteger('post_id')->nullable();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->enum('content_type', ['photo', 'video']);
            $table->string('content_type',500);
            $table->string('content_path', 500);
            $table->text('alt_text')->nullable();
            $table->text('caption')->nullable();

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
    //     Schema::dropIfExists('media');
    // }
};
