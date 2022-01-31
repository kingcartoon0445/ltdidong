<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch văn hóa'
        ]);
        //2
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch sinh thái'
        ]);
        //3
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch thể thao'
        ]);
        //4
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch ẩm thực'
        ]);
        //5
        DB::table('the_loais')->insert([
            'Ten' =>'Teambuilding'
        ]);
        //6
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch núi'
        ]);
        //7
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch biển'
        ]);
        //8
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch nông thôn'
        ]);
        //9
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch đô thị'
        ]);
        //10
        DB::table('the_loais')->insert([
        'Ten' =>'Du lịch nghỉ dưỡng'
        ]);
        //11
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch tâm linh'
            ]);
    }
  
}