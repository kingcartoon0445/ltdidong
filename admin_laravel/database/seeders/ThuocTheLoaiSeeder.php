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
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'4',
            'MaDiaDanh' =>'4'
        ]);
        //DD: 5
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'11',
            'MaDiaDanh' =>'5' 
        ]);
        //DD:6
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'7',
            'MaDiaDanh' =>'6' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'5',
            'MaDiaDanh' =>'6' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'5',
            'MaDiaDanh' =>'6' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'10',
            'MaDiaDanh' =>'6' 
        ]);
        //DD:7
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'2',
            'MaDiaDanh' =>'7' 
        ]);
        //8
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'5',
            'MaDiaDanh' =>'8' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'7',
            'MaDiaDanh' =>'8' 
        ]);
        //9
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'1',
            'MaDiaDanh' =>'9' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'11',
            'MaDiaDanh' =>'9' 
        ]);
        //10
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'7',
            'MaDiaDanh' =>'10' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'5',
            'MaDiaDanh' =>'10' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'10',
            'MaDiaDanh' =>'10' 
        ]);
        //11
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'6',
            'MaDiaDanh' =>'11' 
        ]);
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'2',
            'MaDiaDanh' =>'11' 
        ]);
        //12
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'1',
            'MaDiaDanh' =>'12' 
        ]);
        //13
        DB::table('thuoc_the_loais')->insert([
            'MaTheLoai' =>'1',
            'MaDiaDanh' =>'13' 
        ]);
        //14
        //15
        //16
    }
}

