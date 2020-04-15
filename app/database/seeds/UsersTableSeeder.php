<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * @param Faker $faker
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<100; $i++){
            DB::table('users')->insert([
                'name'=>$faker->name,
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'role'=>$faker->randomElement(['admin','user']),
                'sex'=>$faker->randomElement(['male','female']),
                'active'=>$faker->boolean(50),
                'salary'=>$faker->randomFloat(2,100,5000),
                'email'=>$faker->unique()->email,
                'password'=>bcrypt('secret'),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }


    }
}
