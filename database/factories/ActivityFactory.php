<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'cover_image'=>$faker->randomElement(['images/activities/cover_images/1592832740.jpeg', 'images/activities/cover_images/1592836709.jpeg','images/activities/cover_images/1110234013-3.JPG']),
        'type'=> $faker->randomElement([1, 2]),
        'last_update_user_id' => 1,
        'content' => $faker->randomHtml(3,10),
    ];
});
