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
        //
        DB::table('the_loais')->insert([
            'Ten' =>'Du lịch văn hóa'
      ]);
      DB::table('the_loais')->insert([
          'Ten' =>'Du lịch sinh thái'
    ]);
    DB::table('the_loais')->insert([
      'Ten' =>'Du lịch thể thao' ]);
    }
}
