<?php

use Carbon\Carbon;

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'vertical' => str_random(10),
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => str_random(20),
        'deadline' => Carbon::now(),
        'creator_id' => 1 ,
    ];
});

$factory->define(App\Choice::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'question_id' => 1 ,
    ];
});
