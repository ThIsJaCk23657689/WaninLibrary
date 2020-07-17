<?php

namespace App\Services;
use App\Activity as ActivityEloquent;
use URL;

class ActivityService extends BaseService
{
    public function add($request)
    {
        if(!is_null($request->image_data) && !is_null($_FILES['image_file'])){
            // 圖片路徑生成與裁切
            $crop = new CropImageService($request->image_data, $_FILES['image_file'], 'activities');
            $result = $crop->getResult();
            if($result['status'] == 'ERROR'){
                return [
                    'status' => '422',
                    'message' => $result['message']
                ];
            }else{
                $url = $result['url'];
            }
        }else{
            $url = URL::asset('images/books/default.png');
        }

        $user = auth('api')->user();

        $activity = ActivityEloquent::create([
            'cover_image' => $url,
            'last_update_user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
        ]);

        if($request->is_top == true)
            $this->change_top($activity->id);

        return $activity->id;
    }

    public function getList()
    {
        $activities = ActivityEloquent::get();
        return $activities;
    }

    public function getListFrontend($request, $type)
    {
        $take = 4;
        $skip = $request->skip ?? 0;
        $activities = ActivityEloquent::where('type', $type)->orderBy('is_top', 'desc')->orderBy('created_at', 'desc')->skip($skip)->take($take)->get();
        foreach($activities as $activity){
            $activity->showTitle = $activity->showTitle();
            $activity->showCoverImage = $activity->showCoverImage();
            $activity->showDay = $activity->showDay();
            $activity->showYear = $activity->showYear();
            $activity->showMonth = $activity->showMonth();
            $activity->detailURL = route('front.activities.show', [$activity->id]);
        }
        return $activities;
    }



    public function count($type)
    {
        $total = ActivityEloquent::where('type', $type)->count();
        return $total;
    }

    public function getOne($id)
    {
        $activity = ActivityEloquent::findOrFail($id);
        return $activity;
    }

    public function update($request, $id)
    {
        $activity = $this->getOne($id);

        if(!is_null($request->image_data) && !is_null($_FILES['image_file'])){
            // 圖片路徑生成與裁切
            $crop = new CropImageService($request->image_data, $_FILES['image_file'], 'activities');
            $result = $crop->getResult();
            if($result['status'] == 'ERROR'){
                return [
                    'status' => '422',
                    'message' => $result['message']
                ];
            }else{
                $url = $result['url'];
            }
        }else{
            $url = $activity->cover_image;
        }

        $user = auth('api')->user();

        $activity->update([
            'cover_image' => $url,
            'last_update_user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
        ]);

        if($request->is_top == true)
            $this->change_top($activity->id);

        return $activity->id;
    }

    public function delete($id)
    {
        $activity = $this->getOne($id);
        $activity->delete();
    }

    public function change_top($id){
        $activity = ActivityEloquent::find($id);
        if($activity->type == 1){
            ActivityEloquent::where('is_top', true)->update(['is_top' => false]);
            ActivityEloquent::find($id)->update(['is_top' => true]);
        }

    }

    public function getListForIndex()
    {
        $activities = ActivityEloquent::where('is_top', 0)->where('type', 1)->orderBy('created_at', 'desc')->take(2)->get();
        return $activities;
    }
    public function getListForIndex_top()
    {
        $activity_top = ActivityEloquent::where('type', 1)->where('is_top', 1)->first();
        return $activity_top;
    }
}
