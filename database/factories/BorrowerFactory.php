<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Borrower;
use Faker\Generator as Faker;

$factory->define(Borrower::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'tel' => $faker->randomElement(['02', '03', '04', '05', '06']) . str_pad($faker->numberBetween(100000, 999999), 6, '0', STR_PAD_LEFT),
        'status' => 0
    ];
});
