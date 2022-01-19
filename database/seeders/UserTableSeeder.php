<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([

            [
                'name' => 'Bryan Andres',
                'username' => '@bryan',
                'email' => 'bryan@me.com',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'Jordan Miguel',
                'username' => '@jordan',
                'email' => 'Jordan@me.com',
                'password' => Hash::make('123456')
            ]
        ]);
    }
}
