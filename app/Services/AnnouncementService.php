<?php

namespace App\Services;
use App\Announcement as AnnouncementEloquent;


class AnnouncementService extends BaseService
{
    public function add($request)
    {

        $user = auth('api')->user();
        $announcement = AnnouncementEloquent::create([
            'last_update_user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if($request->is_top == true)
            $this->change_top($announcement->id);

        return $announcement->id;
    }

    public function getList()
    {
        $announcements = AnnouncementEloquent::get();
        return $announcements;
    }

    public function getOne($id)
    {
        $announcements = AnnouncementEloquent::findOrFail($id);
        return $announcements;
    }

    public function update($request, $id)
    {
        $announcement = $this->getOne($id);
        $user = auth('api')->user();
        $announcement->update([
            'last_update_user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        if($request->is_top == true)
            $this->change_top($id);

        return $announcement->id;
    }

    public function delete($id)
    {
        $announcement = $this->getOne($id);
        $announcement->delete();
    }

    public function change_top($id){
        AnnouncementEloquent::where('is_top', true)->update(['is_top' => false]);
        AnnouncementEloquent::find($id)->update(['is_top' => true]);
    }
}