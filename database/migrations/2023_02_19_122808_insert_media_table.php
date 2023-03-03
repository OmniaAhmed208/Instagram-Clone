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
        DB::table('media')->insert([
                [
                    'content_type' => 'video',
                    'content_path' => 'Videos/__.adorable_animals.__-reel-Clx4D40KpO7.mp4',
                    'alt_text' => 'adorable_animals'
                ],
                [
                    'content_type' => 'video',
                    'content_path' => 'Videos/grand_shahin-reel-CofiOCgDtgV.mp4',
                    'alt_text' => 'grand_shahin'
                ],
                [
                    'content_type' => 'video',
                    'content_path' => 'Videos/pawsff-reel-CnZw0ikLFkE.mp4',
                    'alt_text' => 'pawsff'
                ],
                [
                    'content_type' => 'video',
                    'content_path' => 'Videos/petsfnn-reel-Cnd42KXJp6X.mp4',
                    'alt_text' => 'petsfnn'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/animal-sheep.jpg',
                    'alt_text' => 'animal: sheep.'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/astronauts-1.jpg',
                    'alt_text' => 'astronauts-1'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/coffee-1.jpg',
                    'alt_text' => 'coffee-1'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/coffee-2-starbucks.jpg',
                    'alt_text' => 'coffee-2-starbucks'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/flowers-1.jpg',
                    'alt_text' => 'flowers-1'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/flowers-2.jpg',
                    'alt_text' => 'flowers-2'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/house-1-inside.jpg',
                    'alt_text' => 'house-1-inside'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/portrait-korean-man-1.jpg',
                    'alt_text' => 'portrait: korean-man-1'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/portrait-korean-woman-1.jpg',
                    'alt_text' => 'aportrait: korean-woman-1'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/portrait-korean-woman-2.jpg',
                    'alt_text' => 'portrait: korean-woman-2'
                ],
                [
                    'content_type' => 'photo',
                    'content_path' => 'Photos/villagers.jpg',
                    'alt_text' => 'villagers'
                ],
                
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     //
    // }
};
