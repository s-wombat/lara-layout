<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'articul' => $faker->numberBetween(1000, 9999),
        'brand' => $faker->word,
        'image_path' => $faker->imageUrl(100, 100),
        'description' => $faker->text(200),
        'price' => $faker->numberBetween(100, 999),
        'publish' => random_int(0, 1),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
