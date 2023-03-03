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
        Schema::create('post_interaction', function (Blueprint $table) {
            $table->id();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            // $table->foreign('watcher_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('watcher_id')->nullable();
            $table->foreign('watcher_id')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('like')->default(0);
            $table->boolean('saving')->default(0);
            $table->timestamps();
            $table->unique(['post_id', 'watcher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('post_interaction');
    // }
};
