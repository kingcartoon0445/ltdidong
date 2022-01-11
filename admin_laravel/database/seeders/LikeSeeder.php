<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('likes')->insert([
            'MaBaiViet' =>'2',
            'MaNguoiDung' =>'1'
           
      ]);
      DB::table('likes')->insert([
          'MaNguoiDung' =>'2',
          'MaBaiViet' =>'3'
    ]);
    DB::table('likes')->insert([
      'MaNguoiDung' =>'2',
      'MaBaiViet' =>'1' ]);
      DB::table('likes')->insert([
        'MaNguoiDung' =>'3',
        'MaBaiViet' =>'1'
         ]);
    }
}
