<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints

        Transaction::truncate();

        TransactionsTableSeeder::create([
        	'type'=>'Rhapsody of Realities',
        	'amount'=> 100000,
        	'user_id' => 1,
        	'church_id' => 1,
        	'cell_id'=>1
        	]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // disable foreign key constraints
    }
}
