<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeXuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('de_xuats')->insert([
            'MaDiaDanh' =>'2',
            'MaNguoiDung' =>'1'
           
      ]);
      DB::table('de_xuats')->insert([
          'MaNguoiDung' =>'2',
          'MaDiaDanh' =>'3'
    ]);
    DB::table('de_xuats')->insert([
      'MaNguoiDung' =>'2',
      'MaDiaDanh' =>'1' ]);
      DB::table('de_xuats')->insert([
        'MaNguoiDung' =>'3',
        'MaDiaDanh' =>'1'
         ]);
    }
}
