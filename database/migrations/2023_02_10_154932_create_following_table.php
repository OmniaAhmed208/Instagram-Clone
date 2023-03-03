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
        Schema::create('following', function (Blueprint $table) {
            $table->id();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable(); // create column for user id as foreign key // -> nullable => as default value => null
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // constrains

            // $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('follower_id')->nullable();
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('following_action', ['accepted', 'declined']);
            $table->timestamps();
            $table->unique(['user_id', 'follower_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('following');
    // }
};
