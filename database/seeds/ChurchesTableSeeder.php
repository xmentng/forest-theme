<?php

use Illuminate\Database\Seeder;
use App\Church;

class ChurchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints

       Church::truncate();

        ChurchesTableSeeder::create([
        	'name'=>'CE Ikosi',
        	'email'=>'ceikosi@gmail.com',
        	'zone' => 'Zone 1',
        	'country' => 'Nigeria',
        	'user_id'=>1     	
        	]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
    }
}
