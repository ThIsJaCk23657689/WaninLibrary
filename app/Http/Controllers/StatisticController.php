<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BuyedBooksExport;
use App\Exports\TopBooksExport;
use App\Exports\BorrowLogsExport;

class StatisticController extends Controller
{
    public function buyedBooksExport() 
    {
        return Excel::download(new BuyedBooksExport, 'buyed_books.xlsx');
    }

    public function topBooksExport() 
    {
        return Excel::download(new TopBooksExport, 'top_books.xlsx');
    }
    
    public function borrowLogsExport() 
    {
        return Excel::download(new BorrowLogsExport, 'borrow_logs.xlsx');
    }
}
