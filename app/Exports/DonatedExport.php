<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;



class DonatedExport implements FromCollection, WithHeadings,  WithColumnFormatting, WithEvents
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
                // 捐贈人姓名
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(18);
                // 書名
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(80);
                // 書本狀態
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);

            },
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $books = Book::select('created_at', 'donor_id', 'title', 'status')->where('donor_id', '!=', null)->get();
        foreach($books as $book){
            $book->donor_id = $book->donor->name;
            $book->status = $book->showStatus();
        }
        return $books;
    }


    public function headings(): array
    {
        return [
            '日期',
            '捐贈人姓名',
            '書名(主標題)',
            '書籍狀態'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT, //金額保留兩位小數
        ];
    }
}
