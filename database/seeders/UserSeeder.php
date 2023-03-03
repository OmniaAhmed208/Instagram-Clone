<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fist_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => Str::random(10).'@gmail.com',
            'nick_name' => Str::random(10),
            'gender' => Str::random(10),
            'birth_year' => Str::random(10),
            'password' => Hash::make('password'),
            'user_photo_path' => Str::random(10),
            'mobile' => Str::random(10),
            'bio' => Str::random(10),
            'remember_token' => Str::random(10),
        ]);
    }
}
