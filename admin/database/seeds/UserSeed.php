<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$TPDtrykFpEzbgJPQkNni8uYLh5ifcV8ahJOpC/2N2bFzaZQNVXzOm', 'role_id' => 1, 'remember_token' => '', 'sex' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
