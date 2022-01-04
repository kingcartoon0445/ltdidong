<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FKThuoctheloai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thuoctheloais', function (Blueprint $table) {
            //
            $table->foreign('MaTheLoai')->references('id')->on('theloais');
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
        Schema::table('thuoctheloais', function (Blueprint $table) {
            //
        });
    }
}
