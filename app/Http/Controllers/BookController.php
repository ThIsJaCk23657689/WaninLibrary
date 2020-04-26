<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Services\BookService;
use PDF;
// use Spatie\PdfToImage\Pdf as PDFtoImg;
// use Org_Heigl\Ghostscript\Ghostscript;
// use Spatie\Browsershot\Browsershot;
// use Knp\Snappy\Image;
use App;
use Response;
// use SnappyPdf;
use DNS1D;

class BookController extends Controller
{
    public $BookService;

    public function __construct(){
        // $this->middleware('auth.web')->only([
        //     'index', 'create', 'edit', 'show'
        // ]);
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

    public function circulation(){
        return view('books.circulation');
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


    //type:1.一般中文圖書 2.論文 3.雜誌期刊 4.一般非中文圖書
    public function getBookByKeyword(Request $request){
        $msg = $this->BorrowService->getBookByKeyword($request->category, $request->type, $request->keyword);
        return response()->json($msg, 200);
    }

    public function getBookDataByURL(Request $request)
    {
        $url = $request->bugurl;
        $res = $this->BookService->getBookDataByURL($url);
        return response()->json($res, 200)->header('Content-Type', 'application/json; charset=utf-8');
    }

    public function printBarcode($id){
        $book = $this->BookService->getOne($id);

        $snappy = App::make('snappy.image');
        $html = '<table><tbody><tr><td><img src="data:image/png;base64,'.DNS1D::getBarcodePNG($book->barcode, 'C128').'" alt="barcode"   /></td></tr><tr><td style="text-align:center;">'.$book->barcode.'</td></tr></tbody></table>';
        $path = public_path() . '/pdf/'. $book->barcode .'.jpg';
        if (file_exists($path)) {
            unlink($path);
        }
        $snappy->generateFromHtml($html, $path);

        $width = 280;
        $height = 70;
        
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
        $save_path = public_path('pdf') . '/';

        imagejpeg($newimage, $save_path . $imageName);

        return view('books.barcode', compact('book'));
    }

}
