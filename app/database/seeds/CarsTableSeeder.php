<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'name'=>'Toyota',
            'model'=>'Aventis'
        ]);
        DB::table('cars')->insert([
            'name'=>'BMW',
            'model'=>'X6'
        ]);
    }
}
