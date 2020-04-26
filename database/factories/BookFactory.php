<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'donor_id' =>$faker->numberBetween($min = 1, $max = 20),
        'barcode' => $faker->ean13,
        'callnum' =>$faker->numberBetween($min = 100, $max = 999),
        'category'=>$faker->numberBetween($min = 1, $max = 12),
        'status'=>$faker->numberBetween($min = 1, $max = 10),
        'title' => $faker->title,
        'author' => $faker->name,
        'translator'=> $faker->name,
        'publisher' =>$faker->company,
        'ISBN'=> $faker->isbn13,
        'published_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'count' => 0,
        'language' => '中文',
    ];
});
