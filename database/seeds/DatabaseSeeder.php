<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);$this->call(UsersTableSeeder::class);
        $this->call(CellsTableSeeder::class);
        $this->call(ChurchesTableSeeder::class);
        $this->call(MediasTableSeeder::class);
        $this->call(TestimoniesTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
