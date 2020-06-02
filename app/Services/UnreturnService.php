<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Borrow as BorrowEloquent;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use DB;

class UnreturnService extends BaseService
{
    public function getList(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('column'); //Index
        $orderByDir = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        
        // $query = BorrowEloquent::eloquentQuery($orderBy, $orderByDir, $searchValue);
        // $data = $query->paginate($length);

        $data = BorrowEloquent::join('books', 'books.id', '=', 'borrows.book_id')
            ->join('borrowers', 'borrowers.id', '=', 'borrows.borrower_id')
            ->select(
                'borrows.id',
                'borrowers.name as borrower_name',
                'books.title as book_title',
                'borrows.status',
                'borrows.borrow_date',
                'borrows.return_date',
                'borrows.noticed',
            )
            ->where("borrowers.name", "LIKE", "%$searchValue%")
            ->orWhere('books.title', "LIKE", "%$searchValue%")
            ->orderBy($orderBy, $orderByDir)
            ->paginate($length);
        
        foreach($data as $x){
            $x['showStatus'] = $x->showStatus();
            $x['showNoticed'] = $x->showNoticed();
        }
        
        return new DataTableCollectionResource($data);
    }

    public function count()
    {
        return BorrowEloquent::count();
    }
}
