<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker) {
    $title=$faker->sentence(4);
    return [
        'title' => $title,
        'slug'=>Str::slug($title),
        'description' => $faker->paragraph(5),
        'views'=>$faker->numberBetween(1,100),
        'likes'=>$faker->numberBetween(1,10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
