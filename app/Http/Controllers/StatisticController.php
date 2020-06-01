<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BuyedBooksExport;
use App\Exports\TopBooksExport;
use App\Exports\BorrowLogsExport;
use App\Exports\DonatedExport;
use App\Services\BorrowLogService;

class StatisticController extends Controller
{
    public $BorrowLogService;

    public function __construct(){
        $this->middleware('auth.jwt')->only([
            'borrowLogsChartByMonth'
        ]);

        $this->middleware('auth.web')->only([
            'buyedBooksExport', 'topBooksExport', 'borrowLogsExport', 'DonatedExport', 'chartIndex','exportIndex'
        ]);
        $this->BorrowLogService = new BorrowLogService();
    }

    public function chartIndex(){
        return view('statistics.chart.index');
    }

    public function exportIndex(){
        return view('statistics.export.index');
    }

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

    public function DonatedExport()
    {
        return Excel::download(new DonatedExport, 'donated_books.xlsx');
    }

    public function borrowLogsChartByMonth()
    {
        $res = $this->BorrowLogService->borrowLogsChartByMonth();

        return response()->json([
            'status' => 'OK',
            'res' => $res,
        ]);
    }

    public function borrowLogsChartByYear()
    {
        $res = $this->BorrowLogService->borrowLogsChartByYear();

        return response()->json([
            'status' => 'OK',
            'res' => $res,
        ]);
    }
}