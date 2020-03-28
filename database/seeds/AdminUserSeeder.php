<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@jolt.com',
            'role' => 'admin',
            'password' => bcrypt('jolt'),
        ]);
        User::create([
            'name' => 'Admin2',
            'email' => 'admin2@jolt.com',
            'role' => 'admin',
            'password' => bcrypt('jolt'),
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@jolt.com',
            'role' => 'user',
            'password' => bcrypt('jolt'),
        ]);
    }
}
