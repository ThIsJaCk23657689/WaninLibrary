<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'title' => '拾本書堂營業時間更動',
        'cover_image'=>'images/activities/cover_images/1592832740.jpeg',
        'type'=>$faker->randomElement([1, 2]),
        'last_update_user_id' => 1,
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
