<?php

namespace App\Services;
use App\Information as InformationEloquent;
use App\Book as BookEloquent;


class InformationService extends BaseService
{
    

    public function getFirst()
    {
        $information = InformationEloquent::first();
        return $information;
    }

    public function update($request)
    {
        $information = $this->getFirst();

        if(!is_null($request->image_data) && !is_null($_FILES['image_file'])){
            // 圖片路徑生成與裁切
            $crop = new CropImageService($request->image_data, $_FILES['image_file'], 'informations');
            $result = $crop->getResult();
            if($result['status'] == 'ERROR'){
                return [
                    'status' => '422',
                    'message' => $result['message']
                ];
            }else{
                $url = $result['url'];
            }
        }

        $information->update([
            'email' => $request->email,
            'tel' => $request->tel,
            'fax' => $request->fax,
            'address' => $request->address,

            'recommendation_title' => $request->recommendation_title,
            'cover_image' => $url,

            'open_at' => $request->open_at,
            'close_at' => $request->close_at,
        ]);

        return $information->id;
    }

    public function recommendation_getFirst(){
        $books = BookEloquent::class()->where("is_recommended", true)->get();
        $information = $this->getFirst();
        $msg = ['books' => $books, 'recommendation_title' => $information->recommendation_title];
        return $msg;
    }


    public function recommendation_update($request){

    }

}