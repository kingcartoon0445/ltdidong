<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkCoTienIches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('co_tien_iches', function (Blueprint $table) {
            $table->foreign('MaDiaDanh')->references('id')->on('dia_danhs');
            $table->foreign('MaTienIch')->references('id')->on('tien_iches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('co_tien_iches', function (Blueprint $table) {
            //
        });
    }
}
