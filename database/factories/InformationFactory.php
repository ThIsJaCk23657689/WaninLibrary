<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Information;
use Faker\Generator as Faker;

$factory->define(Information::class, function (Faker $faker) {
    return [
        'email' => 'wlibrary@wanin-fund.org.tw',
        'tel' => '(04)2382-5559',
        'fax' => '(04)2382-1977',
        'address' => '412028台中市大里區泉水路86號1樓',
        'open_at' => '11:00',
        'close_at' => '18:00',
        'recommendation_title' => '五月推薦好書',
        'cover_image' => 'images\informations\cover_images\1591692000.jpeg',
        'donate_image' => 'images\informations\0_nkMHIYllnotYcos_.jpg',
    ];
});
