<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaDanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_danhs', function (Blueprint $table) {
            $table->id();
            $table->string('Ten');
            $table->foreignId('MaMien');
            $table->string('KinhDo');
            $table->string('ViDo');
            $table->longText('MoTa');
            $table->string('AnhBia');
            $table->Integer('TrangThai')->default(1);;
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
        Schema::dropIfExists('dia_danhs');
    }
}
