<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginLogService;
use JWTAuth;

class LoginLogController extends Controller
{

    public $LoginLogService;

    public function __construct(){
        $this->middleware('admin.auth.jwt');
        $this->LoginLogService = new LoginLogService();
    }

    public function index()
    {
        $logs = $this->LoginLogService->getList();
        return view('loginLogs.index', compact('logs'));
    }

    public function show($id)
    {
        $logs = $this->LoginLogService->getOne($id);
        return view('loginLogs.show', compact('logs'));
    }

    /* APIs */
    public function getLoginLogs(){
        $logs = $this->LoginLogService->getList();
        return response()->json($logs, 200);
    }

    public function getListOrderByASC(){
        $logs = $this->LoginLogService->getListOrderByASC();
        return response()->json($logs, 200);
    }

    public function getListOrderByUserId(){
        $logs = $this->LoginLogService->getListOrderByUserId();
        return response()->json($logs, 200);
    }

    public function getListOrderByUserIdASC(){
        $logs = $this->LoginLogService->getListOrderByUserIdASC();
        return response()->json($logs, 200);
    }

    public function getLoginLogsById(Request $request){
        $logs = $this->LoginLogService->getOne($request->id);
        return response()->json($logs, 200);
    }

    public function getLoginLogsByUserId(Request $request){
        $logs = $this->LoginLogService->getLoginLogsByUserId($request->user_id);
        return response()->json($logs, 200);
    }

    public function getLoginLogsByUserName(Request $request){
        $keyword = '%'.$request->user_name.'%';
        $logs = $this->LoginLogService->getLoginLogsByUserId($keyword);
        return response()->json($logs, 200);
    }


    // request包含 type(1:login date； 2:logount date) & date
    // & sort_by (1:DESC, 2:ASC)
    public function getLoginLogsByDate(Request $request){
        $logs = $this->LoginLogService->getLoginLogsByDate($request);
        return response()->json($logs, 200);
    }
    // request包含 type(1:login date； 2:logount date) & month & year
    // & sort_by (1:DESC, 2:ASC)
    public function getLoginLogsByMonth(Request $request){
        $logs = $this->LoginLogService->getLoginLogsByMonth($request);
        return response()->json($logs, 200);
    }
    // request包含 type(1:login date； 2:logount date) & year
    // & sort_by (1:DESC, 2:ASC)
    public function getLoginLogsByYear(Request $request){
        $logs = $this->LoginLogService->getLoginLogsByYear($request);
        return response()->json($logs, 200);
    }


}
