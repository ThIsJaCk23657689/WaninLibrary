<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Services\BookService;

class BookController extends Controller
{
    public $BookService;

    public function __construct(){
        //$this->middleware('auth');
        $this->BookService = new BookService();
    }
    public function index(){
        $books = $this->BookService->getList();
        return view('books.index', compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(BookRequest $request){
        $book = $this->BookService->add($request);
        return response()->json([
            'status' => 'OK',
            'book_id' => $book[0],
            'barcode' => $book[1],
            'url' => route('books.index')
        ], 200);
    }

    public function show($id){
        $book = $this->BookService->getOne($id);
        return view('books.show', compact('book'));
    }

    public function edit($id){
        $book = $this->BookService->getOne($id);
        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $request, $id){
        $book_id = $this->BookService->update($request, $id);
        return response()->json([
            'status' => 'OK',
            'added_id' => $book_id,
            'url' => route('books.show', [$book_id])
        ], 200);
    }

    public function destroy($id){
        // 日後注意是否有人在該群組底下，若有無法刪除
        $this->BookService->delete($id);
        return response()->json([
            'status' => 'OK',
            'url' => route('books.index')
        ], 200);
    }

    // API
    public function getlist(){
        $borrowers = $this->BorrowerService->getList();
        return response()->json([
            'status' => 'OK',
            'borrowers' => $borrowers
        ]);
    }

    public function getOne($id){
        $borrower = $this->BorrowerService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'borrower' => $borrower
        ]);
    }

    public function getDataByISBN($isbn){

        return response()->json([
            'status' => 'OK',
        ]);
    }

    public function getDataByISBNFromGoogle($isbn){
        // use key 'http' even if you send the request to https://...
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET',
                'content' => null,
            ]
        ];

        // 先查詢此統編的類型 (公司、分公司、商業)
        $data = [
            'q' => 'isbn:' . $isbn,
            'key' => 'AIzaSyD-x-3Fc0swG4kazBihtZmDMKXBDaZLu38',
        ];
        $url = 'https://www.googleapis.com/books/v1/volumes?' . http_build_query($data);

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        // $result 是string 必須先轉成array
        $result = json_decode($result, true);

        return response()->json([
            'status' => 'OK',
            'result' => $result
        ]);
    }



public function test_curl(Request $request)
{
    // $html = file_get_contents($request->url);
    // $dom = new \DOMDocument();
    // @$dom->loadHTML($html);
    // $tds = $dom->getElementsByTagName('td');
    $doc = new \DOMDocument();
    $html = file_get_contents($request->url);
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
    ];
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

    if($info['language'] != "中文" || $info['language'] != "國語" ){
        $info['callnum'] = $Dewey;
    }
    $res['all'] = $arr;
    $res['data'] = $info;
    return response()->json($res, 200)->header('Content-Type', 'application/json; charset=utf-8');

}

}
