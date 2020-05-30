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
        }else{
            $url = $information->cover_image;
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
        foreach($request->book_ids as $key => $book_id){
            if($book_id){
                BookEloquent::where('is_recommended', $key+1)->update(['is_recommended' => 0]);
                BookEloquent::find((int)$book_id)->update(['is_recommended' => $key+1]);
            }
        }

        $information = $this->getFirst();
        $information->update(['recommendation_title' => $request->recommendation_title]);

    }

    public function recommendation_getBooksByName($request){
        $keyword = '%'.$request->keyword."%";
        $book_list = BookEloquent::where('title', 'like', $keyword)->take(30)->get();
        foreach($book_list as $book){
            $book['showTitle'] = $book->showTitle();
            $book['showCoverImage'] = $book->showCoverImage();

        }
        return $book_list;
    }

}
