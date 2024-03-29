<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(lara\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(lara\pts\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
    ];
});
$factory->define(lara\pts\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});
$factory->define(lara\User::class, function (Faker\Generator $faker) {
    return [
        'name' => "mario",
        'email' => "marioaquino31@hotmailcom",
        'password' => bcrypt(123456),
        'remember_token' => str_random(10)
    ];
});