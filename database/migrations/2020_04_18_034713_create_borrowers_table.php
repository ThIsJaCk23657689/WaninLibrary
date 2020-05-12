<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('編號');

            $table->unsignedBigInteger('agency_id')->nullable()->comment('所屬單位編號');

            $table->string('name')->comment('借閱人名稱');
            $table->date('birthday')->nullable()->comment('借閱人生日');
            $table->string('email')->nullable()->unique()->comment('信箱');
            $table->string('tel')->comment('電話');
            $table->string('job_title')->nullable()->comment('職稱');
            $table->integer('status')->comment('身分別'); //0.一般民眾 1.符合社福資格
            $table->boolean('activated')->default(1)->comment('是否停權'); //0.停權 1.未停權
            
            $table->string('address_zipcode', 6)->nullable()->comment('郵遞區號');
            $table->string('address_county', 10)->nullable()->comment('縣市別');
            $table->string('address_district', 10)->nullable()->comment('鄉鎮市區');
            $table->string('address_others')->nullable()->comment('其他住址');
            $table->string('content')->nullable()->comment('備註');
            $table->integer('count')->default(0)->comment('借閱次數');

            $table->timestamps();

            // $table->foreign('agency_id')->references('id')->on('agencys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}
