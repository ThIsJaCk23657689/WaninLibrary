<?php

namespace App\Services;
use App\Book as BookEloquent;

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
            'cover_image' => $request->cover_image,
            'ISBN' => $request->ISBN,

            'published_date' => $request->published_date,
            'price' => $request->price ?? 0,
            'language' => $request->language,
            'content' => $request->content,
            'count' => $request->count,

        ]);
        $rbook = [$book->id,$barcode];

        return $rbook;
    }

    private function getLastUpdatedID(){
        $book = BookEloquent::orderBy('id', 'ASC')->first();
        if(!empty($user)){
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

    public function getList(){
        $books = BookEloquent::get();
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
            'cover_image' => $request->cover_image,
            'ISBN' => $request->ISBN,

            'published_date' => $request->published_date,
            'price' => $request->price,
            'language' => $request->language,
            'content' => $request->content,
            'count' => $request->count,
        ]);

        return $book->id;
    }

    public function delete($id){
        $book = $this->getOne($id);
        $book->delete();
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

        if($info['language'] != "中文" && $info['language'] != "國語" ){
            $info['callnum'] = $Dewey;
        }
        $res['all'] = $arr;
        $res['data'] = $info;

        return $res;
    }
}
