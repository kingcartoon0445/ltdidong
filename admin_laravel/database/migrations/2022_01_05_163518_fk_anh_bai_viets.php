<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkAnhBaiViets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anh_bai_viets', function (Blueprint $table) {
            $table->foreign('MaBaiViet')->references('id')->on('bai_viets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anh_bai_viets', function (Blueprint $table) {
            //
        });
    }
}
