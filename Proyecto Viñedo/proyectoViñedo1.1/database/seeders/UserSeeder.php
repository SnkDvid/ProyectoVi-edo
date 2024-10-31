<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'username' => 'adminUser',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('123456789'),
            ],
            [
                'name' => 'Vendor User',
                'username' => 'vendorUser',
                'email' => 'vendor@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('123456789'),
            ],
            [
                'name' => 'User',
                'username' => 'user01',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('123456789'),
            ]

            ]);
    }
}
