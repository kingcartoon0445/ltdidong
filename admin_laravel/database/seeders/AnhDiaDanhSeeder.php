<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnhDiaDanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('anh_dia_danhs')->insert([
            'MaDiaDanh' =>'2',
            'Anh' =>'anhcuatoi.jpg'
           
      ]);
      DB::table('anh_dia_danhs')->insert([
          'Anh' =>'anhdayne.jpg',
          'MaDiaDanh' =>'3'
    ]);
    DB::table('anh_dia_danhs')->insert([
      'Anh' =>'anh3.jpg',
      'MaDiaDanh' =>'1' ]);
      DB::table('anh_dia_danhs')->insert([
        'Anh' =>'anh2.jpg',
        'MaDiaDanh' =>'1' ]);
    }
}
