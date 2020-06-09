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
        ActivityEloquent::where('is_top', true)->update(['is_top' => false]);
        ActivityEloquent::find($id)->update(['is_top' => true]);
    }

    public function getListForIndex()
    {
        $activities = ActivityEloquent::where('is_top', 0)->orderBy('updated_at', 'desc')->take(2)->get();
        return $activities;
    }
    public function getListForIndex_top()
    {
        $activity_top = ActivityEloquent::where('is_top', 1)->first();
        return $activity_top;
    }
}
