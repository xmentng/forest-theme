<?php

use Illuminate\Database\Seeder;
use App\Media;

class MediasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::truncate();

        MediasTableSeeder::create([
            'filename'=>'Avatar',
        	'mime'=>'jpeg',
        	'original_filename' => 'mowgli_jungle_book'
        	]);
    }
}
