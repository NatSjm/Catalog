<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Soap;
use Faker\Generator as Faker;

$factory->define(Soap::class, function (Faker $faker) {
    return [
        'weight' => $faker->numberBetween($min = 1, $max = 100)*10,
        'is_antibacterial' => $faker->boolean
    ];
});
