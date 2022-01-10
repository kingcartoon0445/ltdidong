<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       DB::table('miens')->insert([
              'TenMien' =>'Bắc'
        ]);
        DB::table('miens')->insert([
            'TenMien' =>'Trung'
      ]);
      DB::table('miens')->insert([
        'TenMien' =>'Nam'
  ]);
        
    }
}
