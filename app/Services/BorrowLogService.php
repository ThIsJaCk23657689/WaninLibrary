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

    public function getList($skip, $take){
        $logs = BorrowLogEloquent::skip($skip)->take($take)->get();
        foreach($logs as $log){
            $log['showStatus'] = $log->showStatus();
            $log['showTitle'] = $log->showTitle();
            $log['action'] =
                '<a href="' . route('borrowLogs.show', [$log->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>';
        }
        return $logs;
    }

    public function getOne($id){
        $log = BorrowLogEloquent::findOrFail($id);
        return $log;
    }

    public function getBorrowLogsByBorrowerId($request){
        $logs = BorrowLogEloquent::where('borrower_id', $request->borrower_id)
        ->OrderByType($request->order_by)->get();
        return $logs;
    }

    public function getBorrowLogsByBookId($request){
        $logs = BorrowLogEloquent::where('book_id', $request->book_id)
        ->OrderByType($request->order_by)->get();
        return $logs;
    }

    public function getBorrowLogsByStatus($request){
        $logs = BorrowLogEloquent::where('status', $request->status)
        ->OrderByType($request->order_by)->get();
        return $logs;
    }

    // type (1:date, 2:month, 3:year) , value (type=1:'YYYY-MM-DD',2:'MM',3:'YYYY')
    //, value2 (type = 2, 'YYYY' nullable), order_by (1:DESC, 2:ASC),
    // colunm_name (string), colunm_value => 這兩個nullable
    public function getBorrowLogsByTime($request){
        $col_name = $request->column_name;
        $col_value = $request->column_value;
        if($col_name && $col_value){
            $logs = BorrowLogEloquent::OfColumn($col_name, $col_value)
                    ->OfTime($request->type, $request->value, $request->value2)
                    ->OrderByType($request->order_by)->get();
        }else{
            $logs = BorrowLogEloquent::OfTime($request->type, $request->value, $request->value2)
            ->OrderByType($request->order_by)->get();
        }
        return $logs;
    }

    // upper_date , lower_date, order_by (1:DESC, 2:ASC)
    // colunm_name (string), colunm_value => 這兩個nullable
    public function getBorrowLogsByTimeRange($request){
        $col_name = $request->column_name;
        $col_value = $request->column_value;
        if($col_name && $col_value){
            $logs = BorrowLogEloquent::OfColumn($col_name, $col_value)
                    ->whereBetween('created_at', [$request->upper_date, $request->lower_date])
                    ->OrderByType($request->order_by)->get();
        }else{
            $logs = BorrowLogEloquent::whereBetween('created_at', [$request->upper_date, $request->lower_date])
            ->OrderByType($request->order_by)->get();
        }
        return $logs;
    }

}
