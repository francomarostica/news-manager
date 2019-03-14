<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    $image = "/images/article_samples/".rand(1,17).".jpg";

    return [
        "title" => $title,
        "slug" => str_slug($title),
        "description" => $faker->text(200),
        "category_id" => rand(1,8),
        "outstanding_weight" => rand(0,3),
        "image" => $image,
        "state" => $faker->randomElement(["DRAFT", "PUBLISHED", "PENDING"])
    ];
});
