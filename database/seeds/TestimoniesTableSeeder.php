<?php

use Illuminate\Database\Seeder;
use App\Testimony;

class TestimoniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints

       Testimony::truncate();

        TestimoniesTableSeeder::create([
        	'title'=>'Miracle Money',
        	'body'=>'I will like to thank God for His.....',
        	'user_id'=>1
        	]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // disable foreign key constraints
    }
}
