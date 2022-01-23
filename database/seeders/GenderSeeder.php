<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gender')->insert([

            [
                'name' => 'Accion',
            ],
            [
                'name' => 'Terror',
            ],
            [
                'name' => 'Aventura',
            ],
            [
                'name' => 'Fantacia',
            ]
        ]);
    }
}
