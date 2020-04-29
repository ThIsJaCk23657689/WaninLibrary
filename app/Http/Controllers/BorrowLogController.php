<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BorrowLogService;

class BorrowLogController extends Controller
{
    public $BorrowLogService;

    public function __construct(){
        $this->middleware('auth.jwt');
        $this->BorrowLogService = new BorrowLogService();
    }

    public function index(Request $request)
    {
        $logs = $this->BorrowLogService->getList($request->skip, $request->take);
        return view('borrowLogs.index', compact('logs'));
    }


    public function show($id)
    {
        $logs = $this->BorrowLogService->getOne($id);
        return view('borrowLogs.show', compact('logs'));
    }

    //APIs
    public function getBorrowLogs(Request $request){
        $logs = $this->BorrowLogService->getList($request->skip, $request->take);
        return response()->json($logs, 200);
    }

    // 依各欄位搜尋  order_by都一律依created_at
    // request 包含 borrower_id, order_by (1:DESC, 2:ASC)
    public function getBorrowLogsByBorrowerId(Request $request){
        $logs = $this->BorrowLogService->getBorrowLogsByBorrowerId($request);
        return response()->json($logs, 200);
    }

    // request 包含 book_id, order_by (1:DESC, 2:ASC)
    public function getBorrowLogsByBookId(Request $request){
        $logs = $this->BorrowLogService->getBorrowLogsByBookId($request);
        return response()->json($logs, 200);
    }

    // request 包含 status(1-3), order_by (1:DESC, 2:ASC)
    public function getBorrowLogsByStatus(Request $request){
        $logs = $this->BorrowLogService->getBorrowLogsByStatus($request);
        return response()->json($logs, 200);
    }


    // 依時間搜尋
    // type (1:date, 2:month, 3:year) , value (type=1:'YYYY-MM-DD',2:'MM',3:'YYYY')
    //, value2 (type = 2, 'YYYY' nullable), order_by (1:DESC, 2:ASC),
    // colunm_name (string), colunm_value => 這兩個nullable
    public function getBorrowLogsByTime(Request $request){
        $logs = $this->BorrowLogService->getBorrowLogsByTime($request);
        return response()->json($logs, 200);
    }

    // upper_date , lower_date, order_by (1:DESC, 2:ASC)
    // colunm_name (string), colunm_value => 這兩個nullable
    public function getBorrowLogsByTimeRange(Request $request){
        $logs = $this->BorrowLogService->getBorrowLogsByTimeRange($request);
        return response()->json($logs, 200);
    }

}
