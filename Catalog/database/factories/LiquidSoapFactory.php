<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LiquidSoap;
use Faker\Generator as Faker;

$factory->define(LiquidSoap::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween($min = 1, $max = 200)*10,
        'is_antibacterial' => $faker->boolean,
        'contains_surfactants' => $faker->boolean
    ];
});
