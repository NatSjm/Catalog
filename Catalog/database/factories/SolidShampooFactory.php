<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SolidShampoo;
use Faker\Generator as Faker;

$factory->define(SolidShampoo::class, function (Faker $faker) {
    return [
        'weight' => $faker->numberBetween($min = 1, $max = 200)*10
    ];
});
