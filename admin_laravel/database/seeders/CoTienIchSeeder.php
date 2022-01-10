<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoTienIchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('co_tien_iches')->insert([
            'MaTienIch' =>'1',
            'MaDiaDanh' =>'2'
      ]);
      DB::table('co_tien_iches')->insert([
          'MaTienIch' =>'2',
          'MaDiaDanh' =>'3'
    ]);
    DB::table('co_tien_iches')->insert([
      'MaTienIch' =>'3',
      'MaDiaDanh' =>'1' ]);
      DB::table('co_tien_iches')->insert([
        'MaTienIch' =>'2',
        'MaDiaDanh' =>'1' ]);
      }
    }
    

