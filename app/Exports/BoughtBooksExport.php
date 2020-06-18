<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Events\AfterSheet;

class BoughtBooksExport implements FromCollection, WithHeadings, WithColumnFormatting, WithEvents
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
                // 書名
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(80);
                // 價格
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);

            },
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    //注入資料
    public function collection()
    {
        $books = Book::select('created_at', 'title', 'price')->where('donor_id', '=', null)->get();
        foreach($books as $book){
            if($book->price == 0){
                $book->price = '無';
            }
        }
        return $books;
    }

    // public function collection()
    // {
    //     return new Collection($this->createData());
    // }
    // //業務程式碼
    // public function createData()
    // {
    //     return [
    //         ['202ddddddd0年9月', 123456789],
    //         ['20ddddddd20年10月', 123123589],
    //         ['2020年11月', 987654321],

    //     ];
    // }

    //注入欄位名稱
    public function headings(): array
    {
        return [
            '日期',
            '書名',
            '價格'
            // '編號',
            // '捐贈者編號',
            // '條碼',
            // '索書號',
            // '種類',
            // '狀態',
            // '書名',
            // '副標題',
            // '作者',
            // '譯者',
            // '出版商',
            // '版次',
            // '封面照片',
            // 'ISBN',
            // '出版日',
            // '價格',
            // '語言別',
            // '備註',
            // '借閱次數',
            // '上假日',
            // '最後修改日',
        ];
    }

    //註冊事件
    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class  => function(AfterSheet $event) {
    //             //設定列寬
    //             $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(100);
    //             $event->sheet->getDelegate()->getStyle('A1:B3')->applyFromArray([
    //                 'font' => [
    //                     'name' => 'Arial',
    //                     'bold' => true,
    //                     'italic' => false,
    //                     'strikethrough' => false,
    //                     'color' => [
    //                         'rgb' => '808080'
    //                     ]
    //                 ],

    //             ]);
    //         }
    //     ];
    // }

    public function columnFormats(): array
    {
        return [
            // 'A' => NumberFormat::FORMAT_DATE_YYYYMMDD, //日期
            'C' => '0.00', //金額保留兩位小數
        ];
    }
}
