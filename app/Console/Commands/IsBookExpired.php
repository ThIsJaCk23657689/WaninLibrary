<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Borrow as BorrowEloquent;
use App\BorrowLog as BorrowLogEloquent;
use Carbon\Carbon;
use App\Jobs\SendBookExpireNotificationMail;
use Illuminate\Support\Facades\Log;

class IsBookExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-book-isExpired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check-book-isExpired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 判斷是否逾期
        $today = Carbon::today();
        $borrows = BorrowEloquent::all();
        foreach($borrows as $borrow){
            // 書本已到期，將借閱人停權，更改狀態
            if($today->gte($borrow->return_date)){

                // // 更改為逾期中
                // $borrow->status = 2;
                // $borrow->save();
                // $borrow->borrower->activated = 0;
                // $borrow->borrower->save();

                // // 新增借閱紀錄
                // BorrowLogEloquent::create([
                //     'borrower_id' => $borrow->borrower->id,
                //     'borrower_name' => $borrow->borrower->name,
                //     'book_id' => $borrow->book_id,
                //     'book_title' => $borrow->book->title,
                //     'callnum' => $borrow->book->callnum,
                //     'status' => 4,
                // ]);
            }

            $re_date = Carbon::parse($borrow->return_date);
            // 逾期前三天 且該借閱者有信箱 發送郵件提醒

            if($today->eq($re_date->subDays(3)) && $borrow->borrower->email){
                // Log::debug($borrow->borrower_id.':'.$today->eq($re_date->subDays(3)));
                $details = ['email'=> $borrow->borrower->email, 'name' => $borrow->borrower->name,
                            'book_title' => $borrow->book->title,'return_date' => $borrow->return_date,
                            'book_barcode' => $borrow->book->barcode
                            ];
                SendBookExpireNotificationMail::dispatch($details);
            }
            //所有借閱人每逾期超過7的倍數天時，需重新電話通知。 diffInDays
            $dt = $re_date->diffInDays($today, false);
            if(($dt > 0) && ($dt % 7 == 0)){
                $orig_noticed = $borrow->noticed;
                if($orig_noticed == 1){
                   $borrow->noticed = 2;
                   $borrow->save();
                }elseif($orig_noticed == 3){
                    $borrow->noticed = 4;
                    $borrow->save();
                }
            }
        }
    }
}
