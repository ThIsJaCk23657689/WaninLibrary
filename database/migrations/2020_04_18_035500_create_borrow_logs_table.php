<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('borrow_logs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('編號');
            $table->unsignedBigInteger('borrower_id')->comment('借閱者編號');
            $table->string('borrower_name')->comment('借閱人名稱');
            $table->unsignedBigInteger('book_id')->comment('書籍編號');
            $table->string('book_title')->comment('書名或雜誌名');
            $table->string('callnum', 10)->comment('索書號');

            $table->integer('status')->default(1)->comment('借閱狀態');//1.借出 2.歸還 3逾期過久無法討回 4.逾期
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
        Schema::dropIfExists('borrow_logs');
    }
}
