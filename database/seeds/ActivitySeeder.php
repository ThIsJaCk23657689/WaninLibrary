<?php

use Illuminate\Database\Seeder;
use App\Activity as ActivityEloquent;
class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities_isTop = ActivityEloquent::create([
            'title' => '拾本書堂營業時間更動',
            'cover_image'=>'images/activities/cover_images/1592832740.jpeg',
            'type'=> 1,
            'last_update_user_id' => 1,
            'content' => '<p>aaaaaaaaaaaaaaaaaaa</p>',
            'is_top' => 1
        ]);
        $activities_isTop->save();

        $re_isTop = ActivityEloquent::create([
            'title' => '拾本書堂營業時間更動',
            'cover_image'=>'images/activities/cover_images/1592832740.jpeg',
            'type'=> 2,
            'last_update_user_id' => 1,
            'content' => '<p>aaaaaaaaaaaaaaaaaaa</p>',
            'is_top' => 1
        ]);
        $re_isTop->save();

        $activities = factory(ActivityEloquent::class, 80)->create();
    }
}
