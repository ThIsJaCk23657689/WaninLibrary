<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Borrow as BorrowEloquent;
use Log;

class UnreturnService extends BaseService
{
    public function getList(Request $request)
    {
        $skip = $request->skip ?? 0;
        $take = $request->take ?? 30;

        $filter_status = $request->filter_status;
        $filter_noticed = $request->filter_noticed;

        $keyword_column = $request->keyword_column;
        $keyword_content = $request->keyword_content;

        $order_column = $request->order_column ?? 0;
        $order_dir = $request->order_dir ?? 'asc';

        $borrows = BorrowEloquent::join('books', 'books.id', '=', 'borrows.book_id')
            ->join('borrowers', 'borrowers.id', '=', 'borrows.borrower_id')
            ->select(
                'borrows.id',
                'borrowers.id as borrower_id',
                'borrowers.name as borrower_name',
                'books.id as book_id',
                'books.title as book_title',
                'borrows.status',
                'borrows.borrow_date',
                'borrows.return_date',
                'borrows.noticed',
            );
        
        if(!is_null($filter_status) && $filter_status != 0){
            $borrows = $borrows->where('borrows.status', '=', "$filter_status");
        }

        if(!is_null($filter_noticed) && $filter_noticed != 0){
            $borrows = $borrows->where('borrows.noticed', '=', "$filter_noticed");
        }

        if(!is_null($keyword_column) && !is_null($keyword_content) && $keyword_content != ''){
            switch($keyword_column){
                case 1:
                    $borrows = $borrows->where('borrowers.name', 'LIKE', "%$keyword_content%");
                    break;
                case 2:
                    $borrows = $borrows->where('books.title', 'LIKE', "%$keyword_content%");
                    break;
                case 4:
                    $borrows = $borrows->where('borrows.borrow_date', 'LIKE', "%$keyword_content%");
                    break;
                case 5:
                    $borrows = $borrows->where('borrows.return_date', 'LIKE', "%$keyword_content%");
                    break;
                default:
                    $borrows = $borrows->where('borrowers.name', 'LIKE', "%$keyword_content%")
                        ->orWhere('books.title', 'LIKE', "%$keyword_content%")
                        ->orWhere('borrows.borrow_date', 'LIKE', "%$keyword_content%")
                        ->orWhere('borrows.return_date', 'LIKE', "%$keyword_content%");
                    break;
            }
        }

        if(!is_null($order_column)){
            switch($order_column){
                case 1:
                    $borrows = $borrows->orderBy('borrows.borrow_date', $order_dir);
                    break;
                case 2:
                    $borrows = $borrows->orderBy('borrows.return_date', $order_dir);
                    break;
                default:
                    $borrows = $borrows->orderBy('borrows.id', $order_dir);
                    break;
            }
        }

        $DataTotalCount = $borrows->count();
        $borrows = $borrows->skip($skip)->take($take)->get();
        
        $act_user = auth('api')->user();
        foreach($borrows as $key => $borrow){
            $borrow['index'] = $key + 1;
            $borrow['bookLink'] = '<a href="' . route('books.show', [$borrow->book_id]) . '">' . $borrow->book_title . '</a>';
            $borrow['borrowerLink'] = '<a href="' . route('borrowers.show', [$borrow->borrower_id]) . '">' . $borrow->borrower_name . '</a>';
            $borrow['showStatus'] = $borrow->showStatus();
            $borrow['showNoticed'] = $borrow->showNoticed();
            if($act_user->id == 1){
                $borrow['action'] = '<a href="' . route('unreturns.edit', [$borrow->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>';
            }else{
                $borrow['action'] = '';
            }
        }
        
        return [
            'borrows' => $borrows,
            'DataTotalCount' => $DataTotalCount
        ];
    }

    public function count()
    {
        return BorrowEloquent::count();
    }

    public function getOne($id){
        $unreturn = BorrowEloquent::join('books', 'books.id', '=', 'borrows.book_id')
            ->join('borrowers', 'borrowers.id', '=', 'borrows.borrower_id')
            ->select(
                'borrows.id',
                'borrowers.id as borrower_id',
                'borrowers.name as borrower_name',
                'books.id as book_id',
                'books.title as book_title',
                'books.created_at as book_created_at',
                'borrows.status',
                'borrows.borrow_date',
                'borrows.return_date',
                'borrows.noticed',
            )
            ->where('borrows.id', '=', $id)
            ->first();

        $unreturn['showStatus'] = $unreturn->showStatus();
        $unreturn['showNoticed'] = $unreturn->showNoticed();

        return $unreturn;
    }

    public function update($request, $id)
    {
        $unreturn = BorrowEloquent::find($id);
        $unreturn->update([
            'noticed' => $request->noticed,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
        ]);

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 修改了一筆借閱紀錄，編號為：' . $unreturn->id . '。', [$unreturn->showNoticed(), $unreturn->borrow_date, $unreturn->return_date]);

        return $unreturn->id;
    }
}
