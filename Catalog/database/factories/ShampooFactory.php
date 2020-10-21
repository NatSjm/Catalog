<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shampoo;
use Faker\Generator as Faker;

$factory->define(Shampoo::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween($min = 1, $max = 200)*10
    ];
});
