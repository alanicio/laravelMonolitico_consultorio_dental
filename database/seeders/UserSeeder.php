<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'admin',
            'last_name' => 'admin',
            'phone_number' => '5512345678',
            'birthdate'=>date('Y-m-d',strtotime('02/01/1970')),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
