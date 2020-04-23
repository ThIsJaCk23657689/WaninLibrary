<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('編號');
            $table->unsignedBigInteger('donor_id')->nullable()->comment('捐贈者編號');//若為空表示為購買書

            $table->string('barcode', 13)->unique()->comment('條碼序號');//1.一般書 2.論文 3.雜誌期刊+分類號+book_id
            $table->string('callnum', 10)->comment('索書號');
            $table->integer('category')->comment('總類');//0~9.一般書 10.論文 11.雜誌期刊
            $table->integer('status')->comment('狀態'); //1.在庫、2.借出 3.逾期 4.庫藏待上架 5.已淘汰
                                                        //6.已轉贈、7.待索取 8.已被索取、9.無外借、10.無歸還

            $table->string('title')->comment('書名或雜誌名');
            $table->string('subtitle')->nullable()->comment('副標或是期數');
            $table->string('author')->nullable()->comment('作者');
            $table->string('translator')->nullable()->comment('譯者');
            $table->string('publisher')->nullable()->comment('出版商');
            $table->string('edition')->nullable()->comment('版次');
            $table->string('cover_image')->nullable()->comment('封面圖片');
            $table->string('ISBN')->nullable()->comment('ISBN');
            $table->string('published_date')->nullable()->comment('出版日');
            $table->float('price')->default(0)->comment('價格');
            $table->string('language')->nullable()->comment('語言別');

            $table->string('content')->nullable()->comment('備註');
            $table->integer('count')->default(0)->comment('借閱次數');


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
        Schema::dropIfExists('books');
    }
}
