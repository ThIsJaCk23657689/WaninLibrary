<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Donor;
use Faker\Generator as Faker;

$factory->define(Donor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'tel' => $faker->randomElement(['02', '03', '04', '05', '06']) . str_pad($faker->numberBetween(100000, 999999), 6, '0', STR_PAD_LEFT),

        'address_zipcode' => '404', 
        'address_county' => '台中市', 
        'address_district' => '北區', 
        'address_others' => '太平路',

        'exposure' => $faker->randomElement(['1', '2', '3']),

        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
