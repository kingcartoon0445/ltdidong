<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FfDexuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('de_xuats', function (Blueprint $table) {
            //
            $table->foreign('MaNguoiDung')->references('id')->on('nguoi_dungs');
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
        Schema::table('de_xuats', function (Blueprint $table) {
            //
        });
    }
}
