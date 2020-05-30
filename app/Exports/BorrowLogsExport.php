<?php

namespace App\Exports;

use App\BorrowLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class BorrowLogsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $borrowLogs = BorrowLog::select('created_at', 'borrower_name', 'book_title', 'callnum', 'status')->get();
        foreach($borrowLogs as $log){
            $log->status = $log->showStatus();
        }
        return $borrowLogs;
    }

    public function headings(): array
    {
        return [
            '日期',
            '借閱人',
            '書名',
            '書本索書號',
            '狀態',
        ];
    }

    public function columnFormats(): array
    {
        return [

        ];
    }
}
