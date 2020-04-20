<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('編號');

            $table->string('name')->comment('捐贈人名稱');
            $table->date('birthday')->nullable()->comment('生日');
            $table->string('email')->nullable()->comment('信箱');
            $table->string('tel')->nullable()->comment('電話');
            $table->string('cellphone')->nullable()->comment('行動電話');
            
            $table->string('address_zipcode' ,5)->nullable()->comment('郵遞區號');
            $table->string('address_county', 10)->nullable()->comment('縣市別');
            $table->string('address_district', 10)->nullable()->comment('鄉鎮市區');
            $table->string('address_others')->nullable()->comment('其他住址');
<<<<<<< HEAD
            $table->integer('exposure')->default(1)->comment('曝光程度');//1.完全公開 2.半公開 3.前台不曝光
            $table->string('content')->comment('備註內容');
=======

            $table->integer('exposure')->default(1)->comment('曝光程度');//1.完全公開 2.半公開 3.前台不曝光
            $table->string('content')->nullable()->comment('備註內容');
>>>>>>> 45a9e08d89f8b583aba3aed387eff6937755a8c8
            
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
        Schema::dropIfExists('donors');
    }
}
