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
            'cover_image' => $url,

            'open_at' => $request->open_at,
            'close_at' => $request->close_at,
        ]);

        return $information->id;
    }

    public function recommendation_getFirst(){
        $books = BookEloquent::where("is_recommended", '>', 0)->orderBy('is_recommended')->get();
        $information = $this->getFirst();
        foreach($books as $book){
            $book['showTitle'] = $book->showTitle();
            $book['action'] =
                '<a href="' . route('books.show', [$book->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
        }
        $msg = ['books' => $books, 'recommendation_title' => $information->recommendation_title];
        return $msg;
    }


    public function recommendation_update($request){
        BookEloquent::where('is_recommended', '!=', 0)->update(['is_recommended' => 0]);
        BookEloquent::find($request->book_id_1)->update(['is_recommended' => 1]);
        BookEloquent::find($request->book_id_2)->update(['is_recommended' => 2]);
        BookEloquent::find($request->book_id_3)->update(['is_recommended' => 3]);
        BookEloquent::find($request->book_id_4)->update(['is_recommended' => 4]);
        BookEloquent::find($request->book_id_5)->update(['is_recommended' => 5]);
        BookEloquent::find($request->book_id_6)->update(['is_recommended' => 6]);
        BookEloquent::find($request->book_id_7)->update(['is_recommended' => 7]);
        BookEloquent::find($request->book_id_8)->update(['is_recommended' => 8]);
        BookEloquent::find($request->book_id_9)->update(['is_recommended' => 9]);
        BookEloquent::find($request->book_id_10)->update(['is_recommended' => 10]);

        $information = $this->getFirst();
        $information->update(['recommendation_title' => $request->recommendation_title]);

    }

    public function recommendation_getBooksByName($request){
        $keyword = '%'.$request->keyword."%";
        $book_list = BookEloquent::where('title', 'like', $keyword)->get();
        foreach($book_list as $book){
            $book['showTitle'] = $book->showTitle();

        }
        return $book_list;
    }

}
