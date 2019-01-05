<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(rand(40, 80)),
        'body' => $faker->realText(rand(200, 6000)),
        'user_id' => function() {
            return \App\User::inRandomOrder()->first()->id;
        }
    ];
});
