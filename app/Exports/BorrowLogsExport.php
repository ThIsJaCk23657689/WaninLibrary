<?php

namespace App\Exports;

use App\BorrowLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BorrowLogsExport implements FromCollection, WithHeadings,  WithColumnFormatting, WithEvents
{

    public function registerEvents(): array
    {

        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                // 標頭字體放大
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                // 日期
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                // 借閱人
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(18);
                // 書名
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(80);
                // 分類號
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                // 狀態
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);

            },
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $borrowLogs = BorrowLog::select('created_at', 'borrower_name', 'book_title', 'callnum', 'status')->get();
        foreach($borrowLogs as $log){
            $log->callnum = $log->showCallNum();
            $log->status = $log->showStatus();

        }
        return $borrowLogs;
    }



    public function headings(): array
    {
        return [
            '日期',
            '借閱人姓名',
            '書名(主標題)',
            '分類號',
            '書籍狀態',
        ];
    }

    public function columnFormats(): array
    {
        return [

        ];
    }
}
