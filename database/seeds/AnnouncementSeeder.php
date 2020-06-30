<?php

use Illuminate\Database\Seeder;
use App\Announcement as AnnouncementEloquent;
class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Announcement_isTop = AnnouncementEloquent::create([
            'title' => '拾本書堂營業時間更動',
            'last_update_user_id' => 1,
            'content' => '<p>aaaaaaaaaaaaaaaaaaa</p>',
            'is_top' => 1
        ]);
        $Announcement_isTop->save();

        $announcement = factory(AnnouncementEloquent::class, 40)->create();
    }
}
