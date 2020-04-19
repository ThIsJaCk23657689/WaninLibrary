<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agency;
use Faker\Generator as Faker;

$factory->define(Agency::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'tel' => $faker->randomElement(['02', '03', '04', '05', '06']) . str_pad($faker->numberBetween(100000, 999999), 6, '0', STR_PAD_LEFT),
        'principal' => $faker->name,

        'address_zipcode' => '404', 
        'address_county' => '台中市', 
        'address_district' => '北區', 
        'address_others' => '太平路62號5樓之10',

        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
