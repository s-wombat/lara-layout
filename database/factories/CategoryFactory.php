<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'parent_id' => $faker->numberBetween(0, 6),
        'title' => $faker->word,
        'description' => $faker->text(50),
        'publish' => random_int(0, 1),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
