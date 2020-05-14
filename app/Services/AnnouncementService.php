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
        foreach ($announcements as $announcement) {
            $announcement['action'] =
                '<a href="' . route('announcements.show', [$announcement->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('announcements.edit', [$announcement->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-md btn-danger"><i class="far fa-trash-alt"></i></a>';
        }
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
