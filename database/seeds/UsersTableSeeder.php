<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints

        User::truncate();

        User::create([
        	'name'=>'Pablo Escobar',
        	'email'=>'pabloesco@gmail.com',
            'sex' => 0,
        	'password'=> Hash::make('Cyclops@31')
        	]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // disable foreign key constraints
    }
}
