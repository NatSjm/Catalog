<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words($nb = 2, $asText = true),
        'price' => $faker->numberBetween($min = 1, $max = 70000),
        'description' => $faker->paragraph,
        'fragrance_id' => $faker->numberBetween($min = 1, $max = 20)
    ];
});
