<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fragrance;
use Faker\Generator as Faker;

$factory->define(Fragrance::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()-> word,
    ];
});
