<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BorrowLogService;
use Illuminate\Validation\Rule;

class BorrowLogController extends Controller
{
    public $BorrowLogService;

    public function __construct(){
        $this->middleware('auth.jwt')->except([
            'index', 'show',
        ]);

        $this->middleware('auth.web')->only([
            'index', 'show',
        ]);
        $this->BorrowLogService = new BorrowLogService();
    }

    public function index(Request $request)
    {
        // $DataTotalCount = $this->BorrowLogService->count();
        return view('borrowLogs.index');
    }


    public function show($id)
    {
        $log = $this->BorrowLogService->getOne($id);
        return view('borrowLogs.show', compact('log'));
    }

    //APIs
    public function getList(Request $request){
        $this->validate($request, [
            'skip' => 'nullable|integer|',
            'take' => 'nullable|integer|max:100',
            'status' => [
                'nullable',
                Rule::in([1, 2, 3, 4]),
            ],
            'keywords' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',

        ]);

        $request->skip = $request->skip ?? 0;
        $request->take = $request->take ?? 10;
        $request->status = $request->status ?? 4;

        $res = $this->BorrowLogService->getList($request);

        return response()->json([
            'status' => 'OK',
            'DataTotalCount' => $res['count'],
            'logs' => $res['logs'],
            'start_date' => $res['start_date'],
            'request' => $request,
        ]);
    }

    // 依時間範圍搜尋
    // start_date , end_date
    public function getBorrowLogsByTimeRange(Request $request){
        $logs = $this->BorrowLogService->getBorrowLogsByTimeRange($request);
        return response()->json($logs, 200);
    }

    // 關鍵字搜尋
    // request包含 status(預設4:全找) , keyword
    public function getBorrowLogsByKeywords(Request $request){
        $this->validate($request, [
            'status' => [
                'required',
                Rule::in([1, 2, 3, 4]),
            ],
            'keyword' => 'nullable',
        ]);

        $logs = $this->BorrowLogService->getBorrowLogsByKeywords($request);
        return response()->json($logs, 200);

    }

}
