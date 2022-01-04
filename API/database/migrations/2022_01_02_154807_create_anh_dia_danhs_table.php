<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnhDiaDanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anh_dia_danhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('MaDiaDanh');
            $table->string('Anh');
            $table->Integer('TrangThai')->default(1);;
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
        Schema::dropIfExists('anh_dia_danhs');
    }
}
