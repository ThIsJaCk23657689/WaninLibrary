<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Services\BookService;
use App;
use SnappyImage;

class BookController extends Controller
{
    public $BookService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'index', 'create', 'show', 'edit', 'printBarcode'
        ]);
        $this->middleware('auth.jwt')->only([
            'store', 'update', 'destroy', 'getList', 'getOne',
            'getDataByISBNFromGoogle', 'getBookDataByURL', 'getBookDataByBarcode'
        ]);
        $this->BookService = new BookService();
    }

    public function index(){
        $DataTotalCount = $this->BookService->count();
        return view('books.index', compact('DataTotalCount'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(BookRequest $request){
        $res = $this->BookService->add($request);
        return response()->json($res, $res['status']);
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
        $res = $this->BookService->update($request, $id);
        return response()->json($res, $res['status']);
    }

    public function destroy($id){
        $this->BookService->delete($id);
        return response()->json([
            'status' => 'OK',
            'url' => route('books.index')
        ], 200);
    }

    // API
    public function getList(Request $request){
        $this->validate($request, [
            'category' => 'nullable| integer|', //category: 0~9.中文圖書 10.論文 11.雜誌期刊 12.非中文圖書 13.全部(default)
            'type' => 'nullable| integer|', //type:(default) 0.全部 1.書名 2.作者 3.ISBN 4.出版商
            'status' => 'nullable| integer|', //status: (default) 0.全部 1.在庫、2.借出 3.逾期 4.庫藏待上架 5.已淘汰 6.已轉贈、7.待索取 8.已被索取、9.無外借、10.無歸還
            'keywords' => 'nullable| string|',
            'skip' => 'nullable| integer|',
            'take' => 'nullable|integer|max:100'
        ]);

        $res = $this->BookService->getList($request);

        return response()->json([
            'status' => 'OK',
            'DataTotalCount' => $res['count'],
            'books' => $res['books'],
            'request' => $request,
        ]);
    }

    public function getOne($id){
        $book = $this->BookService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'book' => $book
        ]);
    }

    // 使用barcode來找尋書本
    public function getBookDataByBarcode(Request $request) {
        $this->validate($request, [
            'barcode' => 'required|string|size:13'
        ]);
        $book = $this->BookService->getBookDataByBarcode($request->barcode);
        return response()->json([
            'status' => 'OK',
            'book' => $book
        ]);
    }

    // 使用Google Books API透過ISBN來抓取書籍資料
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

    // type: 1.中文圖書 2.論文 3.雜誌期刊 4.外文圖書
    public function getBookByKeyword(Request $request){
        $msg = $this->BorrowService->getBookByKeyword($request->category, $request->type, $request->keyword, $request->skip, $request->take);
        return response()->json($msg, 200);
    }

    // 使用台灣書目查詢系統，透過網址來爬蟲(抓取資料)
    public function getBookDataByURL(Request $request){
        $url = $request->bugurl;
        $res = $this->BookService->getBookDataByURL($url);
        return response()->json($res, 200)->header('Content-Type', 'application/json; charset=utf-8');
    }

    // 將Barcode輸出成圖片
    public function printBarcode($id){
        $book = $this->BookService->getOne($id);

        // 圖片儲存路徑
        $path = public_path() . '/images/books/barcode/'. $book->barcode .'.jpg';
        if (file_exists($path)) {
            // 如果已經有圖檔，就先刪除。
            unlink($path);
        }

        // 注意：使用barryvdh/laravel-snappy套件，請務必要安裝wkhtmltox。
        // 安裝好wkhtmltox要到config/snappy.php 設定wkhtmltopdf和wkhtmltoimage兩者的路徑

        // 載入snappy到服務容器IoC 這是Laravel 4.x的用法
        // $snappy = App::make('snappy.image');
        // $snappy->generateFromHtml(view('books.barcode', compact('book'))->render(), $path);

        // Laravel 5.5以上，可以到config的alias註冊，引用SnappyImage就可以了。
        $html = view('books.barcode', compact('book'))->render();
        SnappyImage::generateFromHtml($html, $path);

        // 單位為像素px。
        $width = 270;
        $height = 100;

        $newimage = imagecreatetruecolor($width, $height);
        $oimage = imagecreatefromjpeg($path);
        imagecopy($newimage,
            $oimage,
            0, 0,
            0,
            0,
            $width, $height);
        $ext = 'jpg';
        $imageName = $book->barcode . '.' . $ext;
        $save_path = public_path() . '/images/books/barcode/';

        imagejpeg($newimage, $save_path . $imageName);

        return view('books.barcode', compact('book'));
    }
}
