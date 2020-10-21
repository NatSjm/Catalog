<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Toothpaste;
use Faker\Generator as Faker;

$factory->define(Toothpaste::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween($min = 1, $max = 30)*10,
        'whitening_effect' => $faker->boolean
    ];
});

