<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dale Lanto',
            'email' => 'dalelanto.work@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
