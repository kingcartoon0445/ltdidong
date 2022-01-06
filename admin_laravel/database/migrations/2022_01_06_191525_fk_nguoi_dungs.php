<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkNguoiDungs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nguoi_dungs', function (Blueprint $table) {
            $table->foreign('MaLoaiTK')->references('id')->on('loai_tai_khoans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nguoi_dungs', function (Blueprint $table) {
            //
        });
    }
}
