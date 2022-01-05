<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkThuocTheLoais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thuoc_the_loais', function (Blueprint $table) {
            $table->foreign('MaTheLoai')->references('id')->on('the_loais');
            $table->foreign('MaDiaDanh')->references('id')->on('dia_danhs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thuoc_the_loais', function (Blueprint $table) {
            //
        });
    }
}
