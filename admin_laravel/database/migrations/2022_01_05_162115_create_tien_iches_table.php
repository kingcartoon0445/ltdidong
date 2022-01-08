<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTienIchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tien_iches', function (Blueprint $table) {
            $table->id();
            $table->string('Anh');
            $table->string('Ten');
            $table->string('Loai');
            $table->string('DiaChi');
            $table->string('MoTa');
            $table->string('SDT');
            $table->Integer('TrangThai')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tien_iches');
    }
}
