<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('編號');

            $table->string('name')->comment('單位名稱');
            $table->string('tel')->nullable()->comment('電話');
            $table->string('principal',10)->nullable()->comment('負責人');
            $table->string('address_zipcode',5)->nullable()->comment('郵遞區號');
            $table->string('address_county',10)->nullable()->comment('縣市別');
            $table->string('address_district',10)->nullable()->comment('鄉鎮市區');
            $table->string('address_others')->nullable()->comment('其他住址');
            $table->string('content')->nullable()->comment('備註');

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
        Schema::dropIfExists('agencies');
    }
}
