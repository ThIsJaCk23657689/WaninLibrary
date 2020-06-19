<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TopBooksExport implements FromCollection, WithHeadings,  WithColumnFormatting, WithEvents
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                // 標頭字體放大
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                // 書名
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(80);
                // 借閱次數
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(18);

            },
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::select('title', 'count')->where('count', '>', 0)->orderBy('count', 'DESC')->take(100)->get();
    }

    public function headings(): array
    {
        return [
            '書名(主標題)',
            '借閱次數'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT, //金額保留兩位小數
        ];
    }
}
