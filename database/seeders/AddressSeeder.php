<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'user_id' => 1,
            'addr1' => 'Lorem Ipsum is simply dummy text ',
            'addr2' => 'It was popularised in the 1960',
            'city' => 'Manila',
            'postcode' => '0000',
            'country' => 'Philippines',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
