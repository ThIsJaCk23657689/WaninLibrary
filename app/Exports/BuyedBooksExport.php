<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Illuminate\Support\Collection;

class BuyedBooksExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //注入資料
    public function collection()
    {
        return Book::select('created_at', 'title', 'price')->where('donor_id', '=', null)->get();
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
