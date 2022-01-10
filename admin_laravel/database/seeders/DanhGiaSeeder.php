<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('danh_gias')->insert([
            'MaDiaDanh' =>'2',
            'MaNguoiDung' =>'1',
            'SoDanhGia'=>'3'
           
      ]);
      DB::table('danh_gias')->insert([
          'MaNguoiDung' =>'2',
          'MaDiaDanh' =>'3',
          'SoDanhGia'=>'5'
    ]);
    DB::table('danh_gias')->insert([
      'MaNguoiDung' =>'2',
      'MaDiaDanh' =>'1',
      'SoDanhGia'=>'4.5' ]);
      DB::table('danh_gias')->insert([
        'MaNguoiDung' =>'3',
        'MaDiaDanh' =>'1',
        'SoDanhGia'=>'4.5' ]);
      
    }
}
