<?php

namespace App\Services;
use App\Borrow as BorrowEloquent;
use App\BorrowLog as BorrowLogEloquent;
use App\Borrower as BorrowerEloquent;
use App\Book as BookEloquent;
use Carbon\Carbon;

class BorrowLogService extends BaseService
{
    public function count(){
        return BorrowLogEloquent::count();
    }

    public function getList($request){
        if($request->first_page){
            $skip = 0;
        }else{
            $skip = $request->skip ?? 0 ;
        }
        $take = $request->take  ?? 10;
        $status = $request->status  ?? 5;
        $start_date = ($request->start_date != "") ? $request->start_date : null;
        $end_date = ($request->end_date != "") ? $request->end_date : null;
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

        if($keywords == [] && $status== 5 && $start_date == null && $end_date== null){
            $logs_tmp = new BorrowLogEloquent();
            $count = $logs->count();
            $logs = $logs_tmp->skip($skip)->take($take)->get();


        }else{
            $logs_tmp = BorrowLogEloquent::query()->where(function ($query) use ($keywords, $status, $start_date, $end_date) {
                foreach ($keywords as $keyword) {
                    $query->ofColumns($keyword);
                }
            });
            if($status != 5){
                $logs_tmp->where('status', $status);
            }
            if($start_date != null &&  $end_date != null){
                $start = Carbon::createFromFormat('Y-m-d H:i', $start_date.' 00:00')->toDateTimeString();
                $end = Carbon::createFromFormat('Y-m-d H:i', $end_date.'23:59')->toDateTimeString();
                $logs_tmp->whereBetween('created_at', [$start, $end]);

            }
            $count = $logs_tmp->count();
            $logs = $logs_tmp->skip($skip)->take($take)->get();

        }

        foreach($logs as $log){
            $log['showStatus'] = $log->showStatus();
            $log['showTitle'] = $log->showTitle();
            $log['showCallNum'] = $log->showCallNum();
            $log['action'] =
                '<a href="' . route('borrowLogs.show', [$log->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
        }
        $res = ['logs' => $logs, 'count' => $count, 'start_date' => $start_date];
        return $res;
    }

    public function getOne($id){
        $log = BorrowLogEloquent::findOrFail($id);
        return $log;
    }


    public function getBorrowLogsByTimeRange($request){
        $logs = BorrowLogEloquent::ofRange($request->start_date, $request->end_date)->get();
        foreach($logs as $log){
            $log['showStatus'] = $log->showStatus();
            $log['showTitle'] = $log->showTitle();
            $log['action'] =
                '<a href="' . route('borrowLogs.show', [$log->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
        }
        return $logs;
    }

    public function getBorrowLogsByKeywords($request){
        $keywords = explode(" ", $request->keyword);
        $status = $request->status;

        $logs = BorrowLogEloquent::query()->where(function ($query) use ($keywords, $status) {
            foreach ($keywords as $keyword) {
                $query->ofColumns($status, $keyword);
            }
        })->get();

        foreach($logs as $log){
            $log['showStatus'] = $log->showStatus();
            $log['showTitle'] = $log->showTitle();
            $log['action'] =
                '<a href="' . route('borrowLogs.show', [$log->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
        }
        return $logs;
    }

    public function borrowLogsChartByMonth(){
        $firstDay = date("Y-m-01");
        $lastDay = date("Y-m-t");
        for($i=0; $i<12; $i++){
            $counter = BorrowLogEloquent::where('created_at', '>=', $firstDay)->where('created_at', '<=', $lastDay)->where('status', 1)->count();
            $count[$i] = $counter;
            $date[$i] = substr($firstDay, 0, 7);
            $firstDay = date('Y-m-d',strtotime(str_replace('-', '/', $firstDay) . "-1 month"));
            $lastDay = date('Y-m-d',strtotime(str_replace('-', '/', $lastDay) . "-1 month"));
        }
        $res = ['count' => array_reverse($count), 'date' => array_reverse($date), 'maxValue' => max($count)];
        return $res;
    }

    public function borrowLogsChartByYear(){
        $firstDay = date("Y-01-01");
        $lastDay = date("Y-12-t");
        for($i=0; $i<10; $i++){
            $counter = BorrowLogEloquent::where('created_at', '>=', $firstDay)->where('created_at', '<=', $lastDay)->where('status', 1)->count();
            $count[$i] = $counter;
            $date[$i] = substr($firstDay, 0, 4);
            $firstDay = date('Y-m-d',strtotime(str_replace('-', '/', $firstDay) . "-1 year"));
            $lastDay = date('Y-m-d',strtotime(str_replace('-', '/', $lastDay) . "-1 year"));
        }
        $res = ['count' => array_reverse($count), 'date' => array_reverse($date), 'maxValue' => max($count)];
        return $res;
    }

}
