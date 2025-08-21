<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\Hash;
Use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('1234'),
                'role' => 'admin',
                'status' => 'active',
            ],

            //Agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@mail.com',
                'password' => Hash::make('1234'),
                'role' => 'agent',
                'status' => 'active',
            ],

            //User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@mail.com',
                'password' => Hash::make('1234'),
                'role' => 'user',
                'status' => 'active',
            ]
        ]);
    }
}
