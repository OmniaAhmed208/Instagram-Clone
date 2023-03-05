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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nick_name')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_year')->nullable();  //indteed of age
            $table->string('user_photo_path', 500)->nullable();
            $table->integer('mobile')->nullable();
            $table->text('bio')->nullable();
            $table->rememberToken();
            $table->timestamps();  //joined instagram at: created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('users');
    // }
};
