<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id')->comment('編號');
            $table->string('name')->comment('姓名');
            $table->string('account')->unique()->comment('帳號');
            $table->string('email')->unique()->comment('信箱');
            // 註冊時要注意有驗證confirmed，前端要多傳一個password_confirmation資料
            $table->string('password')->comment('密碼');
            $table->integer('status')->default(1)->comment('權限別，0為系統管理者；1為一般使用者');
            $table->string('tel')->nullable()->comment('電話號碼');
            $table->string('address_zipcode',5)->nullable()->comment('郵遞區號');
            $table->string('address_county',10)->nullable()->comment('縣市別');
            $table->string('address_district',10)->nullable()->comment('鄉鎮市區');
            $table->string('address_others')->nullable()->comment('其他住址');
            $table->string('content')->nullable()->comment('備註');
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
