<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Services\BookService;

class BookController extends Controller
{
    public $BookService;


    public function __construct()
    {
        //$this->middleware('auth');
        $this->BookService = new BookService();
    }
    public function index()
    {
        $books = $this->BookService->getList();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = $this->BookService->add($request);
        return response()->json([   'status'=>'OK',
                                    'added_id'=>$book[0],
                                    'barcode'=>$book[1],
                                    'url'=>route('books.index')],
                                    200);
    }


    public function barcodeCreate(Request $request)
    {
        return  response()->json('1223',200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->BookService->getOne($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->BookService->getOne($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book_id = $this->BookService->update($request, $id);
        return response()->json(['status'=>'OK',
                                'added_id'=>$book_id,
                                'url'=>route('books.show',[$book_id])],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //日後注意是否有人在該群組底下，若有無法刪除
        $this->BookService->delete($id);
        return  response()->json(['status'=>'OK','url'=>route('books.index')],200);
    }


    public function test_crul(Request $request){
        
        // $html = file_get_contents($request->url);
        // $dom = new \DOMDocument();
        // @$dom->loadHTML($html);
        
        // $tds = $dom->getElementsByTagName('td');

        $doc = new \DOMDocument();
        $html = file_get_contents($request->url);
        $html = strstr($html,'<form');
        $html = strstr($html,'<table');
        $html = strstr($html,'<input',true);
        // return $html;
        @$doc->loadHTML($html);
        $tds = $doc->getElementsByTagName('td');
        $arr = [];
        $count = 0;
        foreach($tds as $td){
            $count++;
            $arr[] = $td->nodeValue;
        }
        $headers = array('Content-Type' => 'application/json; charset=utf-8');
        return response()->json($arr, 200)->header('Content-Type', 'application/json; charset=utf-8')->header('Charset', 'utf-8');
        // return response()->json($arr, 200,  ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        // JSON_UNESCAPED_UNICODE);
        // return $tds;

    }
}
