<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Book as BookEloquent;
use App\Borrow as BorrowEloquent;
use App\BorrowLog as BorrowLogEloquent;
use App\Services\CropImageService;
use Exception;
use Log;

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

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 新增了一筆書籍，編號為：' . $book->id . '。');

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
        $category = $request->category ?? 14; //default 14
        $type = $request->type ?? 0; //default 0
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

        $type_arr = ['','title', 'author', 'ISBN', 'publisher'];

        if($keywords == [] && $status== 0 && $category == 14 && $type== 0){
            // all default
            $books_tmp = new BookEloquent();
            $count = $books_tmp->count();
            $books = $books_tmp->skip($skip)->take($take)->get();


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
            $book['borrowCounts'] = $book->count;
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
        // 借閱中不能更改狀態
        if($book->status == 2){
            $status = $book->status;
        }elseif($book->status == 3 && ($request->status == 10 || $request->status == 3)){
            //逾期中只能被改成無歸還或逾期中
            if($request->status == 10 ){
                // 改成無歸還
                $borrow = BorrowEloquent::where('book_id', $id)->where('status', 2)->orderBy('created_at', 'desc')->first();
                $borrow->status = 3;
                $borrow->save();
                // 新增借閱紀錄
                BorrowLogEloquent::create([
                    'borrower_id' => $borrow->borrower_id,
                    'borrower_name' => $borrow->borrower->name,
                    'book_id' => $id,
                    'book_title' => $book->title,
                    'callnum' => $book->callnum,
                    'status' => 3,
                ]);
            }
            $status = $request->status;
        }elseif($book->status == 10){
            // 無歸還不能更改狀態
            $status = $book->status;
        }else{
             $status = $request->status;
        }

        $book->update([
            'donor_id' => $request->donor_id,
            // 'barcode' => $request->barcode,
            'callnum' => $request->callnum ?? '000',
            'category' => $request->category,
            'status' => $status,
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

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 編輯了一筆書籍，編號為：' . $book->id . '。');

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

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 刪除了一筆書籍，編號為：' . $book->id . '，名稱為：' . $book->title . '。');
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

    // type 0.預設 1~6:欄位(1.書名 2.作者 3.出版商 4. 出版年份 5.譯者 6.ISBN)
    // 7~20 書籍種類 -7 (7.總類 8.哲學類 9.宗教類 10.科學類 11.應用科學類 12.社會學類
    // 13.史地類 14.中國史地類 15.世界史地類  16.語文文學類 17.藝術類 18.論文 19.期刊雜誌 20 .非中文圖書)
    // orderBy 1:最新-最舊desc 2:最舊-最新asc
    public function getListFrontend($request){
        
        if($request->firstPage == 1){
            // 強制從第一頁開始。
            $skip = 0;
        }else{
            // 看從第幾頁開始。
            $skip = $request->skip ?? 0 ;
        }

        // $status = 1可借閱(館藏查詢); 7免費索取(免費索取書單)
        $status =  $request->status ?? 1;
        if($status == 1){
            // 如果是館藏查詢，一次抓4筆資料。
            $take = 4;
        }else{
            // 否則會是免費索取書單，一次抓6筆資料。
            $take = 6;
        }

        // 看是什麼條件，預設就是沒有限制條件。
        $type = $request->type ?? 0;
        // 看排序的方法。
        $orderBy = ($request->orderBy == 0 || $request->orderBy == 1) ? 1 : 2 ;
        // 看關鍵字，會切割成陣列。
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

        $type_arr = ['', 'title', 'author', 'publisher', 'published_date', 'translator', 'ISBN'];

        $books = new BookEloquent();

        // 可借閱或免費書單。
        if(!is_null($status) && $status != 0){
            $books = $books->where('status', '=', $status);
        }

        // 過濾
        if(!is_null($type) && ($type > 6)){
            // type 不為null 而且 大於6 => 類別 過濾
            $books = $books->where('category', '=', $type - 7);
        } 

        if(!is_null($type) && ($type >= 0 && $type <= 6)){
            // type 不為null 而且 介於0到6之間 => keyword 搜尋
            if(!is_null($keywords) && $keywords != []){
                // $keywords 不是空陣列才需要進行搜尋
                if($type == 0){
                    $books = $this->keywordSearch($books, $type_arr, $keywords, 'all');
                }else{
                    $books = $this->keywordSearch($books, $type_arr, $keywords, $type);
                }
            }
        }else{
            if(!is_null($keywords) && $keywords != []){
                $books = $this->keywordSearch($books, $type_arr, $keywords, 'all');
            }
        }

        if($orderBy == 1){
            $books = $books->orderBy('created_at', 'desc');
        }else{
            $books = $books->orderBy('created_at', 'asc');
        }
        
        $count = $books->count();
        $books = $books->skip($skip)->take($take)->get();

        foreach($books as $book){
            $book->showTitle = $book->showTitle();
            $book->showCoverImage = $book->showCoverImage();
            $book->showURL = route('front.books.show', $book->id);
            $book->source = $book->showSource();
        }

        return [
            'books' => $books, 
            'count' => $count
        ];
    }

    private function keywordSearch($model, $column, $keywords, $searchType){
        if($searchType == 'all'){
            $result = $model->where(function ($query) use ($column, $keywords){
                $c = 0;
                for($i = 1; $i <= 6; $i++){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        if($c == 0){
                            $query->where($column[$i], 'like', $keyword);
                            $c++;
                        }else{
                            $query->orWhere($column[$i], 'like', $keyword);
                        }
                    }
                }
            });
        }else{
            $result = $model->where(function ($query) use ($column, $keywords, $searchType){
                $c = 0;
                foreach ($keywords as $keyword) {
                    $keyword = '%'.$keyword.'%';
                    if($c == 0){
                        $query->where($column[$searchType], 'like', $keyword);
                        $c++;
                    }else{
                        $query->orWhere($column[$searchType], 'like', $keyword);
                    }
                }
            });
        }
        return $result;
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
