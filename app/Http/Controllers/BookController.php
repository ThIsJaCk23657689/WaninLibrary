<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Services\BookService;
use PDF;
use Spatie\PdfToImage\Pdf as PDFtoImg;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\Browsershot\Browsershot;
use Knp\Snappy\Image;
use App;
use SnappyPdf;

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

    public function getBookDataByURL(Request $request)
    {
        $url = $request->bugurl;
        $res = $this->BookService->getBookDataByURL($url);
        return response()->json($res, 200)->header('Content-Type', 'application/json; charset=utf-8');
    }

    public function printBarcode($id){
        $book = $this->BookService->getOne($id);

        return SnappyPdf::loadFile('https://tw.yahoo.com')->inline('yahoo.pdf');
 
		// // 从 URL 链接生成 PDF
		// $snappy->generate('http://www.github.com', '/tmp/test.php');
 
		// // 获取转换后的 PDF 字符串
		// $pdf_response = $snappy->getOutputFromHtml($html);
		// // 直接输出到浏览器下载
		// return response($pdf_response, 200, [
		// 	'Content-Type'          => 'application/pdf',
		// 	'Content-Disposition'   => 'attachment; filename="file.pdf"'
		// ]);

        // Browsershot::url('https://google.com')->save(public_path() . '\pdf\example.pdf');
        // Browsershot::html('<h1>Hello world!!</h1>')->save(public_path() . '\images\example.jpg');

        // $customPaper = array(30, 0, 120.00, 227.00);
        // $pdf = PDF::loadView('books.barcode', compact('book'))->setPaper($customPaper, 'landscape');

        // $path = public_path().'\pdf\barcode.pdf';
        // $pdf->save($path);

        // $pdf = new PDFtoImg($path);
        // $pdf->saveImage(public_path().'\pdf\barcode.jpg');

        // $gs = new Ghostscript ();
        // $gs->setDevice('jpeg')
        // // Set the input file
        // ->setInputFile($path)
        // // Set the output file that will be created in the same directory as the input
        // ->setOutputFile(public_path().'\pdf\dd.jpg')
        // // Set the resolution to 96 pixel per inch
        // ->setResolution(96)
        // // Set Text-antialiasing to the highest level
        // ->setTextAntiAliasing(Ghostscript::ANTIALIASING_HIGH);  

        // return $pdf->download(storage_path().'_filename.png');

        return view('books.barcode', compact('book'));
    }

}
