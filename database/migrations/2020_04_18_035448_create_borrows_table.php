<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id')->comment('借閱者編號');//若為空表示為購買書
            $table->unsignedBigInteger('book_id')->comment('書籍編號');//若為空表示為購買書

            $table->date('return_date')->comment('到期日');
            $table->integer('status')->default(1)->comment('借閱狀態');//1.未逾期 2.逾期中 3.逾期過久無法討回
            $table->integer('noticed')->default(4)->comment('通知');//1.郵件電話皆已通知 2.郵件已通知、電話未通知 
                                                                    //3.郵件未通知、電話已通知 4.郵件電話皆未通知。
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
