<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Sergalas',
            'first_name'=>'Serge',
            'last_name'=>'Beloventsev',
            'email'=>'hudos@rambler.ru',
            'password'=>bcrypt('password')
        ]);
    }
}
