<?php

namespace App\Services;
use App\User as UserEloquent;
use App\LoginLog as LoginLogEloquent;
use JWTAuth;
use Carbon\Carbon;
use Log;

class LoginLogService extends BaseService
{
    // 'user_id', 'logout_date', 'content'
    public function add(){
        $user = auth('api')->user();

        LoginLogEloquent::create([
            'user_id' => $user->id,
            'logout_date' => null,
            'content' => '系統於24小時後自動登出',
        ]);

        Log::info('編號：' . $user->id . '，姓名：' . $user->name . '登入了後台。', ['IP' => $this->getLoggingIP()]);
    }

    public function update(){
        $user = auth('api')->user();

        // 抓最新的那筆資料
        $log = LoginLogEloquent::where('user_id', $user->id)->latest()->first();
        $log->update([
            'logout_date' => Carbon::now(),
        ]);

        Log::info('編號：' . $user->id . '，姓名：' . $user->name . '登出了後台。', ['IP' => $this->getLoggingIP()]);
    }

    public function getList(){
        $logs = LoginLogEloquent::orderBy('created_at','desc')->get();

        foreach($logs as $log){

            $url =  route('loginLogs.show', [$log->id]);
            $href = '<a href="' .$url. '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
            $log->url = $href;
            $log->user_name = UserEloquent::withTrashed()->find($log->user_id)->name;

            $log->logout_date = $log->logout_date ? $log->logout_date : $log->content;
        }
        return $logs;
    }

    public function getListOrderByASC(){
        $logs = LoginLogEloquent::withTrashed()->orderBy('id','asc')->get();
        return $logs;
    }

    public function getListOrderByUserId(){
        $logs = LoginLogEloquent::withTrashed()->orderBy('user_id','desc')->get();
        return $logs;
    }

    public function getListOrderByUserIdASC(){
        $logs = LoginLogEloquent::withTrashed()->orderBy('user_id','asc')->get();
        return $logs;
    }

    public function getOne($id){
        $log = LoginLogEloquent::withTrashed()->findOrFail($id);
        $log->user_name = UserEloquent::withTrashed()->find($log->user_id)->name;
        return $log;
    }

    public function getLoginLogsByUserId($user_id){
        $logs = LoginLogEloquent::where('user_id', $user_id)->orderBy('id')->get();
        return $logs;
    }

    public function getLoginLogsByUserName($keyword){
        $logs = UserEloquent::where('name','like', $keyword)->with('loginLogs')->orderBy('id')->get();
        return $logs;
    }

    public function getLoginLogsByDate($request){
        $type = $request->type;
        $date = $request->date;
        // $sort_by =$request->sort_by;
        // if($sort_by == 1){
        //     $logs = LoginLogEloquent::ofDate($type, $date)->sortByDate_DESC($type)->get();
        // }else{
        //     $logs = LoginLogEloquent::ofDate($type, $date)->sortByDate_ASC($type)->get();
        // }

        $logs = LoginLogEloquent::ofDate($type, $date)->sortByDate_DESC($type)->get();
        foreach($logs as $log){
            $log->user_name = UserEloquent::withTrashed()->find($log->user_id)->name;
            $url =  route('loginLogs.show', [$log->id]);
            $href = '<a href="' .$url. '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
            $log->url = $href;
            $log->logout_date = $log->logout_date ? $log->logout_date : $log->content;
        }
        return $logs;
    }

    public function getLoginLogsByMonth($request){
        $type = $request->type;
        $year_month = $request->year_month;
        $year_month_arr = explode("-",$year_month);
        $year = $year_month_arr[0];
        $month = $year_month_arr[1];
        // $sort_by =$request->sort_by;
        // if($sort_by == 1){
        //     $logs = LoginLogEloquent::ofYear($type, $year)
        //     ->ofMonth ($type, $month)->sortByDate_DESC($type)->get();
        // }else{
        //     $logs = LoginLogEloquent::ofYear($type, $year)
        //     ->ofMonth ($type, $month)->sortByDate_ASC($type)->get();
        // }

        $logs = LoginLogEloquent::ofYear($type, $year)
            ->ofMonth ($type, $month)->sortByDate_DESC($type)->get();

        foreach($logs as $log){
            $log->user_name = UserEloquent::withTrashed()->find($log->user_id)->name;
            $url =  route('loginLogs.show', [$log->id]);
            $href = '<a href="' .$url. '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
            $log->url = $href;
            $log->logout_date = $log->logout_date ? $log->logout_date : $log->content;
        }

        return $logs;
    }

    public function getLoginLogsByYear($request){
        $type = $request->type;
        $year = $request->year;
        // $sort_by =$request->sort_by;
        // if($sort_by == 1){
        //     $logs = LoginLogEloquent::ofYear($type, $year)->sortByDate_DESC($type)->get();
        // }else{
        //     $logs = LoginLogEloquent::ofYear($type, $year)->sortByDate_ASC($type)->get();
        // }

        $logs = LoginLogEloquent::ofYear($type, $year)->sortByDate_DESC($type)->get();

        foreach($logs as $log){
            $log->user_name = UserEloquent::withTrashed()->find($log->user_id)->name;
            $url =  route('loginLogs.show', [$log->id]);
            $href = '<a href="' .$url. '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
            $log->url = $href;
            $log->logout_date = $log->logout_date ? $log->logout_date : $log->content;
        }

        return $logs;
    }

    public function getLoginLogsByTimeRange($request){
        // type(1:login date； 2:logount date) & start_date & end_date 'YYYY-MM-DD'
        $type = $request->type;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $logs = LoginLogEloquent::ofRange($type, $start_date, $end_date)->sortByDate_DESC(1)->get();

        foreach($logs as $log){
            $log->user_name = UserEloquent::withTrashed()->find($log->user_id)->name;
            $url =  route('loginLogs.show', [$log->id]);
            $href = '<a href="' .$url. '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
            $log->url = $href;
            $log->logout_date = $log->logout_date ? $log->logout_date : $log->content;
        }

        return $logs;
    }

    private function getLoggingIP(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
