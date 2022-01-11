<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnhBaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('anh_bai_viets')->insert([
            'MaBaiViet' =>'2',
            'Anh' =>'anhcuatoi.jpg'
           
      ]);
      DB::table('anh_bai_viets')->insert([
          'Anh' =>'anhdayne.jpg',
          'MaBaiViet' =>'3'
    ]);
    DB::table('anh_bai_viets')->insert([
      'Anh' =>'anh3.jpg',
      'MaBaiViet' =>'1' ]);
      DB::table('anh_bai_viets')->insert([
        'Anh' =>'anh2.jpg',
        'MaBaiViet' =>'1' ]);
        DB::table('anh_bai_viets')->insert([
            'Anh' =>'anhcuaai.jpg',
            'MaBaiViet' =>'2' ]);
    }
}
