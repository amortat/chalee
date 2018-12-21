<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Mission::class, function (Faker $faker) {
    return [
        'slug' => $faker->unique()->slug(),
        'name' => $faker->name,
        'level' => $faker->numberBetween(1, 7),
        'user_id' => $faker->numberBetween(1, 3),
        'job' => $faker->realText(45),
        'key' => $faker->realText(15),
        'photo_path' => $faker->imageUrl(350, 350)
    ];
});

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'name' => $faker->name,
        'level' => $faker->numberBetween(1, 7),
        'missionsNo' => $faker->numberBetween(1, 4),
        'playersNo' => $faker->numberBetween(1, 5),
        'city' => $faker->city,
        'region' => $faker->citySuffix,
        'cost' => $faker->randomDigitNotNull,
        'prize' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Challenge::class, function (Faker $faker) {
    return [
        'slug' => $faker->unique()->slug(),
        'game_id' => $faker->numberBetween(1, 3),
        'user_id' => $faker->numberBetween(1, 3),
        'status' => '0',


    ];


});
