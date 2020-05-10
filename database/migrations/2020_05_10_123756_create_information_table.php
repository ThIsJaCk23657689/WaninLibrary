<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('email')->comment('信箱');
            $table->string('tel')->comment('電話');
            $table->string('fax')->comment('傳真');
            $table->string('address')->comment('傳真');
            $table->time('open_at')->comment('開館時間');
            $table->time('close_at')->comment('閉館時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
