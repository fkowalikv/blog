<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, \App\Post::all()->count()),
        'author_id' => $faker->numberBetween(1, \App\User::all()->count()),
        'comment' => $faker->sentence(),
        'important' => $faker->boolean(),
    ];
});
