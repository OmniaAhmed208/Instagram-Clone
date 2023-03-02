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
            $table->string('nick_name')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->year('birth_year');  //indteed of age
            $table->string('user_photo_path', 500)->default();
            $table->integer('mobile');
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
