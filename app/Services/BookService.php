<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Book as BookEloquent;
use App\Services\CropImageService;
use Exception;
use Illuminate\Support\Facades\Log;

class BookService extends BaseService
{
    public function add(Request $request){

        // 條碼編號生成
        $request->callnum = $request->callnum ?? '000';
        $barcode = $this->barcodeCode($request->category, $request->callnum);

        if(!is_null($request->image_url)){
            // 代表這次的圖片是外來網址。
            $url = $request->image_url;
        }else if(!is_null($request->image_data) && !is_null($_FILES['image_file'])){
            // 圖片路徑生成與裁切
            $crop = new CropImageService($request->image_data, $_FILES['image_file'], 'books');
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
            // 沒有要存圖片
            $url = null;
        }

        if($request->addType == 2){
            $request->donor_id = null;
        }else{
            if($request->donor_id == "null"){
                $request->donor_id = 1;
            }
            $request->price = 0;
        }

        $book = BookEloquent::create([
            'donor_id' => $request->donor_id,
            'barcode' => $barcode,
            'callnum' => $request->callnum,
            'category' => $request->category,
            'status' => config('book.status.INSTOCK'),
            'title' => $request->title,
            'subtitle' => $request->subtitle,

            'author' => $request->author,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
            'cover_image' => $url,
            'ISBN' => $request->isbn,
            'position' => $request->position,

            'published_date' => $request->published_date,
            'price' => $request->price ?? 0,
            'language' => $request->language,
            'content' => $request->content,
            'count' => 0,
        ]);

        return [
            'status' => '200',
            'book_id' => $book->id,
            'barcode' => $barcode,
            'url' => route('books.show', [$book->id])
        ];
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
            $callnum = '000';
        }elseif($cate == 12){
            $cate = 3;
            $callnum = '000';
        }elseif($cate == 13){
            $cate = 4;              //非中文
            $callnum = '000';
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
            return $code." Some undefined errors happened.";
        }else{
            return $code;
        }
    }

    public function count(){
        return BookEloquent::count();
    }

    // category: 0~9.中文圖書 11.論文 12.雜誌期刊 13.非中文圖書 14.全部(default)
    // type:(default) 0.全部 1.書名 2.作者 3.ISBN 4.出版商
    // status: (default) 0.全部 1.在庫、2.借出 3.逾期 4.庫藏待上架 5.已淘汰 6.已轉贈、7.待索取 8.已被索取、9.無外借、10.無歸還
    public function getList($request){
        if($request->first_page){
            $skip = 0;
        }else{
            $skip = $request->skip ?? 0 ;
        }

        $take = $request->take ?? 10;
        $status = $request->status ?? 0; //default 0
        $category = $request->category ?? 14; //default 13
        $type = $request->type ?? 0; //default 0
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

        $type_arr = ['','title', 'author', 'ISBN', 'publisher'];

        if($keywords == [] && $status== 0 && $category == 13 && $type== 0){
            // all default
            $books_tmp = new BookEloquent();
            $books = $books_tmp->skip($skip)->take($take)->get();
            $count = $books_tmp->count();

        }else{
            $books_tmp = BookEloquent::query()->where(function ($query) use ($keywords, $status, $category, $type, $type_arr) {


                $c = 0;
                if($type != 0 && $keywords != []){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        if($c == 0){
                            $query->where($type_arr[$type], 'like',$keyword);
                            $c++;
                        }else{
                            $query->orWhere($type_arr[$type], 'like',$keyword);
                        }

                    }
                }elseif($keywords != []){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        for($i = 1; $i<=4; $i++){
                            if($c == 0){
                                $query->where($type_arr[$i], 'like',$keyword);
                                $c++;
                            }else{
                                $query->orWhere($type_arr[$i], 'like',$keyword);
                            }
                        }
                    }
                }



            });
            if($status != 0){
                $books_tmp->where('status', $status);
            }
            if($category != 14){
                $books_tmp->where('category', $category);
            }
            $count = $books_tmp->count();
            $books = $books_tmp->skip($skip)->take($take)->get();
        }

        foreach($books as $book){
            $book['showTitle'] = $book->showTitle();
            $book['showStatus'] = $book->showStatus();
            $book['borrowCounts'] = 0;
            $book['action'] =
                '<a href="' . route('books.show', [$book->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('books.edit', [$book->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>
                <button type="button" class="btn btn-md btn-danger delete-btn"><i class="far fa-trash-alt"></i></button type="button">
                <span class="d-none">' . route('books.destroy', [$book->id]) . '</span>';
        }
        $res = ['books'=>$books, 'count' => $count];
        return $res;
    }

    public function getOne($id){
        $book = BookEloquent::with('donor')->findOrFail($id);
        // $book['donor_name'] = $book->donor->name;
        return $book;
    }

    public function update($request, $id){
        $book = $this->getOne($id);

        // 若書封面未做更動，不執行圖片裁切。
        if(!is_null($request->image_data) && !is_null($_FILES['image_file'])){
            // 圖片路徑生成與裁切
            $crop = new CropImageService($request->image_data ?? null, $_FILES['image_file'] ?? null, 'books');
            $result = $crop->getResult();
            if($result['status'] == 'ERROR'){
                return [
                    'status' => '422',
                    'message' => $result['message']
                ];
            }
        }else{
            $result['url'] = $book->cover_image;
        }
        if($request->addType == 2){
            $request->donor_id = null;
        }else{
            if($request->donor_id == "null"){
                $request->donor_id = $book->donor_id;
            }
            $request->price = 0;
        }


        $book->update([
            'donor_id' => $request->donor_id,
            // 'barcode' => $request->barcode,
            'callnum' => $request->callnum ?? '000',
            'category' => $request->category,
            'status' => $request->status,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'cover_image' => $result['url'],

            'author' => $request->author,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
            'ISBN' => $request->isbn,
            'position' => $request->position,

            'published_date' => $request->published_date,
            'price' => $request->price ?? 0,
            'language' => $request->language,
            'content' => $request->content,
            // 'count' => $request->count,
        ]);

        return [
            'status' => 200,
            'book_id' => $book->id,
            'barcode' => $book->barcode ,
            // 'cover_image' => $result['result'],
            'url' => route('books.index')
        ];
    }

    public function delete($id){
        $book = $this->getOne($id);
        $book->delete();
    }

    public function getBookDataByBarcode($barcode) {
        $book = BookEloquent::where('barcode', $barcode)->first();
        if(!is_null($book)){
            $book['showStatus'] = $book->showStatus();
            if($book->donor){
                $book['donorName'] = $book->donor->name;
            }else{
                $book['donorName'] = '此為採購書籍';
            }

        }
        return $book;
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
            return [
                'status' => 404,
                'message' => '此URL已經失效'
            ];
        }

        @$iframe_doc->loadHTML($orig_html);
        $iframe = $iframe_doc->getElementsByTagName('iframe');
        if(is_null($iframe[0])){
            return [
                'status' => 404,
                'message' => '無法爬到蟲，請稍後再試。'
            ];
        }
        $iframe_src = $iframe[0]->getAttribute('src');

        $doc = new \DOMDocument();
        $doc_img = new \DOMDocument();
        $context = stream_context_create(array(
            'http' => array(
            'ignore_errors'=>true,
            'method'=>'GET'
            // for more options check http://www.php.net/manual/en/context.http.php
            )
            ));
        $new_url = str_replace(' ','%20', 'http://metadata.ncl.edu.tw'.$iframe_src);
        $html = file_get_contents($new_url, false, $context);
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
                    // $info['ISBN'] = strstr($str,' ',true);
                    $info['ISBN'] = $str;
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
        $res['status'] = 200;

        return $res;
    }

    public function getBookCountByCategory(){

        $data = [];
        $labels = [];
        for($i=0; $i<14; $i++){
            $counter = BookEloquent::where('category', '=', $i)->count();
            $data[$i] = $counter;
            $labels[$i] = $this->showCategory($i);
        }
        $res = ['label' => $labels, 'count' => $data, 'maxValue' => max($data)];
        return $res;
    }

    protected function showCategory($category){
        switch ($category) {
            case 0:
                $result = '總類';
                break;
            case 1:
                $result = '哲學類';
                break;
            case 2:
                $result = '宗教類';
                break;
            case 3:
                $result = '科學類';
                break;
            case 4:
                $result = '應用科學類';
                break;
            case 5:
                $result = '社會學類';
                break;
            case 6:
                $result = '史地類';
                break;
            case 7:
                $result = '中國史地類';
                break;
            case 8:
                $result = '世界史地類';
                break;
            case 9:
                $result = '語文文學類';
                break;
            case 10:
                $result = '藝術類';
                break;
            case 11:
                $result = '論文類';
                break;
            case 12:
                $result = '期刊雜誌類';
                break;
            case 13:
                $result = '外文圖書';
                break;

            default:
                $result = '未分類';
                break;
        }
        return $result;
    }
}
