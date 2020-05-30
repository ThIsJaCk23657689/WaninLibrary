<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BorrowService;
use App\Http\Requests\BorrowRequest;

class BorrowController extends Controller
{
    public $BorrowService;

    public function __construct()
    {
        $this->middleware('auth.web')->only([
            'index', 'create', 'show', 'edit', 'circulation', 'showBorrowPage',
        ]);
        $this->middleware('auth.jwt')->only([
            'borrow', 'returnBook'
        ]);
        $this->BorrowService = new BorrowService();
    }

    // 顯示借還書頁面
    public function circulation()
    {
        return view('circulation.index');
    }

    // 顯示書籍借出頁面
    public function showBorrowPage()
    {
        return view('circulation.borrow');
    }

    public function index()
    {
        $borrows = $this->BorrowService->getList();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        return view('borrows.create');
    }

    public function show($id)
    {
        $borrow = $this->BorrowService->getOne($id);
        return view('borrows.show', compact('borrow'));
    }

    // ==================== APIs ====================
    // 借閱書籍儲存
    public function borrow(Request $request)
    {
        $result = $this->BorrowService->add($request);
        return response()->json($result, $result['status']);
    }

    public function getBorrowListByBorrowerID(Request $request)
    {
        $msg = $this->BorrowService->getBorrowListByBorrowerID($request->id);
        return response()->json($msg, 200);
    }


    public function getBorrowListByStatus(Request $request)
    {
        $msg = $this->BorrowService->getBorrowListByStatus($request->status);
        return response()->json($msg, 200);
    }

    public function getBorrowListByNoticed(Request $request)
    {
        $msg = $this->BorrowService->getBorrowListByNoticed($request->noticed);
        return response()->json($msg, 200);
    }

    // 還書
    public function returnBook(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'required|string|size:13|exists:books,barcode'
        ]);

        $result = $this->BorrowService->returnBook($request->barcode);

        return response()->json($result, $result['status']);
    }

    public function bookExpired(Request $request)
    {
        $msg = $this->BorrowService->bookExpired($request->id);
        return response()->json(['msg' => $msg], 200);
    }

    public function Notified(Request $request)
    {
        $msg = $this->BorrowService->bookExpired($request->id);
        return response()->json(['msg' => $msg], 200);
    }
}
