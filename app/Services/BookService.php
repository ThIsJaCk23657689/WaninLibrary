<?php

namespace App\Services;
use App\Book as BookEloquent;
use App\Services\CropImageService;
use Exception;


class BookService extends BaseService
{
    public function add($request){
        $barcode = $this->barcodeCode($request->category, $request->callnum);

        $book = BookEloquent::create([
            'donor_id' => $request->donor_id,
            'barcode' => $barcode,
            'callnum' => $request->callnum,
            'category' => $request->category,
            'status' => $request->status,
            'title' => $request->title,
            'subtitle' => $request->subtitle,

            'author' => $request->author,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
            'cover_image' => null,
            'ISBN' => $request->ISBN,

            'published_date' => $request->published_date,
            'price' => $request->price ?? 0,
            'language' => $request->language,
            'content' => $request->content,
            'count' => $request->count,

        ]);

        // 圖片儲存
        $msg = $this->saveImage($request, $book);

        $res = ['status' => $msg['state'], 'msg' => $msg['message'], 'book_id' => $book->id, 'barcode' => $barcode ,'cover_image' => $msg['result'], 'url' => route('books.index')];
        return $res;
    }

    private function saveImage(Request $request, $book){
        if(!preg_match("/^[a-zA-Z]+:\/\//", $request->cover_image)){
            // 不是網址
            $crop = new CropImageService(
                $request->has('image_src') ? $request->image_src : null,
                $request->has('image_data') ? $request->image_data : null,
                isset($_FILES['image_file']) ? $_FILES['image_file'] : null,
                $book->id,
                ['type' => 'book']
            );
            if (is_null($crop->getMsg())) {
                //代表上傳成功
                $ImageURL = $book->cover_image;
                if(!preg_match("/^[a-zA-Z]+:\/\//", $ImageURL)){
                    if (!empty($ImageURL)) {
                        //刪除原本的圖片
                        //代表不是網址 是server上檔檔案 先刪除原圖檔
                        unlink($ImageURL);
                    }
                }
                //資料庫新增
                $book->update([
                    'cover_image' => $crop->getResult(),
                ]);

                return ['status' => 200,'message' => $crop->getMsg(),'result' => URL::asset($crop->getResult())];
            }else{
                // failed
                return ['status' => 422,'message' => $crop -> getMsg(),'result' => URL::asset($crop -> getResult())] ;
            }
        }else{
            // 是網址
            $url = $request->cover_image;
            $book->update([
                'cover_image' => $url,
            ]);
            return ['status' => 200, 'message' => 'OK', 'result' => $url];
        }
    }

    private function getLastUpdatedID(){
        $book = BookEloquent::orderBy('id', 'DESC')->first();
        if(!empty($book)){
            return $book->id;
        }
        return 0;
    }

    private function barcodeCode($cate, $callnum){
        $book_id = $this->getLastUpdatedID() + 1;

        if($cate == 11){
            $cate = 2;
            $callnum = 000;
        }elseif($cate == 12){
            $cate = 3;
            $callnum = 000;
        }elseif($cate == 13){
            $cate = 4;              //非中文
            $callnum = 000;
        }elseif($cate >= 0 and $cate <= 10){
            $cate = 1;
            $callnum = substr($callnum, 0, 3);
        }else{
            return "Category number error.";
        }

        if($book_id >= 10000000){
            return "Book id out of range.";
        }else{
            $book_id = str_pad($book_id, 9, "0", STR_PAD_LEFT);
        }

        $code = $cate.$callnum.$book_id;

        if(strlen($code) != 13){
            return "Some undefined errors happened.";
        }else{
            return $code;
        }
    }

    public function count(){
        return BookEloquent::count();
    }

    public function getList($skip, $take){
        $books = BookEloquent::skip($skip)->take($take)->get();
        foreach($books as $book){
            $book['showTitle'] = $book->showTitle();
            $book['showStatus'] = $book->showStatus();
            $book['borrowCounts'] = 0;
            $book['action'] = 
                '<a href="' . route('books.show', [$book->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('books.edit', [$book->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-md btn-danger"><i class="far fa-trash-alt"></i></a>';
        }
        return $books;
    }

    public function getOne($id){
        $book = BookEloquent::findOrFail($id);
        return $book;
    }

    public function update($request, $id){
        $book = $this->getOne($id);
        $book->update([
            'donor_id' => $request->donor_id,
            'barcode' => $request->barcode,
            'callnum' => $request->callnum,
            'category' => $request->category,
            'status' => $request->status,
            'title' => $request->title,
            'subtitle' => $request->subtitle,

            'author' => $request->author,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
            'cover_image' => null,
            'ISBN' => $request->ISBN,

            'published_date' => $request->published_date,
            'price' => $request->price,
            'language' => $request->language,
            'content' => $request->content,
            'count' => $request->count,
        ]);
        // 圖片儲存
        $msg = $this->saveImage($request, $book);

        $res = ['status' => $msg['state'], 'msg' => $msg['message'], 'book_id' => $book->id, 'barcode' => $book->barcode ,'cover_image' => $msg['result'], 'url' => route('books.index')];
        return $res;
    }

    public function delete($id){
        $book = $this->getOne($id);
        $book->delete();
    }

    //category:1.一般中文圖書 2.論文 3.雜誌期刊 4.一般非中文圖書 5.不分類
    //type:1.書名 2.作者 3.ISBN 4.出版商 5.依種類
    public function getBookByKeyword($category, $type, $keyword, $skip, $take){
        if($category>5)
            return "Undefined category.";
        if($type>5)
            return "Undefined type.";

        switch ($category){
            case 1:
                switch ($type){
                    case 1:
                        $book = BookEloquent::NormalCh()->where("title", 'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 2:
                        $book = BookEloquent::NormalCh()->where("author",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 3:
                        $book = BookEloquent::NormalCh()->where("ISBN",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 4:
                        $book = BookEloquent::NormalCh()->where("publisher",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 5:
                        $book = BookEloquent::NormalCh()->where("category",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                }
            case 2:
                switch ($type){
                    case 1:
                        $book = BookEloquent::Paper()->where("title",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 2:
                        $book = BookEloquent::Paper()->where("author",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 3:
                        $book = BookEloquent::Paper()->where("ISBN",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 4:
                        $book = BookEloquent::Paper()->where("publisher",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                }
            case 3:
                switch ($type){
                    case 1:
                        $book = BookEloquent::Magazine()->where("title",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 2:
                        $book = BookEloquent::Magazine()->where("author",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 3:
                        $book = BookEloquent::Magazine()->where("ISBN",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 4:
                        $book = BookEloquent::Magazine()->where("publisher",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                }
            case 4:
                switch ($type){
                    case 1:
                        $book = BookEloquent::NormalEn()->where("title",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 2:
                        $book = BookEloquent::NormalEn()->where("author",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 3:
                        $book = BookEloquent::NormalEn()->where("ISBN",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 4:
                        $book = BookEloquent::NormalEn()->where("publisher",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                }
            case 5:
                switch ($type){
                    case 1:
                        $book = BookEloquent::where("title",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 2:
                        $book = BookEloquent::where("author",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 3:
                        $book = BookEloquent::where("ISBN",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 4:
                        $book = BookEloquent::where("publisher",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                    case 5:
                        $book = BookEloquent::NormalCh()->where("category",'like',"%".$keyword."%")->skip($skip)->take($take)->get();
                        break;
                }
        }

        return $book;
    }


    public function getBookDataByURL($url){

        $iframe_doc = new \DOMDocument();
        try{
            $orig_html = file_get_contents($url);
        }catch(Exception $e){
            return response()->json('url已失效', 200);
        }

        @$iframe_doc->loadHTML($orig_html);
        $iframe = $iframe_doc->getElementsByTagName('iframe');
        $iframe_src = $iframe[0]->getAttribute('src');

        $doc = new \DOMDocument();
        $doc_img = new \DOMDocument();

        $html = file_get_contents($iframe_src);
        @$doc_img->loadHTML($html);
        $img = $doc_img->getElementsByTagName('img');
        $len = count($img);
        $img_src = $img[$len-1]->getAttribute('src');

        $html = strstr($html,'<form');
        $html = strstr($html,'<table');
        $html = strstr($html,'<input',true);
        @$doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $tds = $doc->getElementsByTagName('td');
        $arr = [];
        $info = [
            'title'=>'',
            'subtitle'=>'',
            'author'=>'',
            'ISBN'=>'',
            'publisher'=>'',
            'published_date'=>'',
            'edition'=>'',
            'callnum'=>'',
            'Dewey_callnum'=>'',
            'category'=>'',
            'language'=>'',
            'content'=>'',
            'cover_img'=>$img_src,
        ];
        $Dewey ="";
        $count = 0;
        foreach($tds as $td){
            $str = str_replace("\n","",$td->nodeValue);
            $arr[] = $str;
            switch ($str) {
                case "題名Title":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['title'] = $str;
                    break;
                case "作者Creator":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['author'] = $str;
                    break;
                case "貢獻者Other agent":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['author'] .= ', '.$str;
                    break;
                case "國際標準書號ISBN":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $str = str_replace('-', '',$str);
                    $str = str_replace(';', '',$str);
                    $info['ISBN'] = strstr($str,' ',true);
                    break;
                case "出版項Publication":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['publisher'] = trim(str_replace(':','',strstr(strstr($str,':'), ", ", true)));
                    $info['published_date'] =trim(str_replace(',','',strstr(strstr($str,' : '), ", ")));
                    break;
                case "版本Edition":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['edition'] = $str;
                    break;
                case "中文圖書分類號CCL No.":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['callnum'] = $str;
                    $info['category'] = (int)substr($str , 0, 1);
                    break;
                case "備註Notes":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['content'] = $str;
                    break;
                case "杜威分類號Dewey No.":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $str = str_replace('-', '',$str);
                    $Dewey = $str;
                    if($info['callnum'] == ""){
                        $info['callnum'] = $str;
                    }
                    $info['Dewey_callnum'] = $Dewey;
                    $info['category'] = 13;
                    break;
                case "語文Language":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['language'] = $str;
                    break;
                case "相關題名Other Title":
                    $str = str_replace("\n","",$td->nextSibling->nodeValue);
                    $info['subtitle'] = $str;
                    break;
            }
            $count++;
        }


        $res['all'] = $arr;
        $res['data'] = $info;

        return $res;
    }
}
