<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->sentence(1),
        'body' => $faker->paragraph(1),
        'image' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
