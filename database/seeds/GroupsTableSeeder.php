<?php

use Illuminate\Database\Seeder;
use App\Cell;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cell::truncate();

        Cell::create([
        	'name'=>'Avante Garde',
        	'user_id'=>1,
        	'church_id'=>1
        	]);
    }
}
