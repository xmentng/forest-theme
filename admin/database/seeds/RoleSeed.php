<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)', 'display_name' => null, 'description' => null,],
            ['id' => 2, 'title' => 'Simple user', 'display_name' => null, 'description' => null,],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
