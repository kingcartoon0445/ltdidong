<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThuocTheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'1',
            'MaDiaDanh' =>'2'
      ]);
      DB::table('thuoc_the_loais')->insert([
          'MaTheLoai' =>'2',
          'MaDiaDanh' =>'3'
    ]);
    DB::table('thuoc_the_loais')->insert([
      'MaTheLoai' =>'3',
      'MaDiaDanh' =>'1' ]);
    }
}

