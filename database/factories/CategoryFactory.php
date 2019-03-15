<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $title = $faker->word(1);

    return [
        "title" => $title,
        "slug" => str_slug($title),
        "image" => $faker->imageUrl($width=90, $height=90)
    ];
});
