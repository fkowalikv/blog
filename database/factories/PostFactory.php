<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->paragraph(4),
        'author_id' => $faker->numberBetween(1, \App\User::all()->count()),
    ];
});
