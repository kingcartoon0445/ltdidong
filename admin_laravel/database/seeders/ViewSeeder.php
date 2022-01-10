<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('views')->insert([
            'MaBaiViet' =>'2',
            'MaNguoiDung' =>'1'
           
      ]);
      DB::table('views')->insert([
          'MaNguoiDung' =>'2',
          'MaBaiViet' =>'3'
    ]);
    DB::table('views')->insert([
      'MaNguoiDung' =>'2',
      'MaBaiViet' =>'1' ]);
      DB::table('views')->insert([
        'MaNguoiDung' =>'3',
        'MaBaiViet' =>'1'
         ]);
    }
}
