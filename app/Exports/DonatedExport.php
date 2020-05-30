<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DonatedExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
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
            '書名', 
            '書本狀態'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT, //金額保留兩位小數
        ];
    }
}
