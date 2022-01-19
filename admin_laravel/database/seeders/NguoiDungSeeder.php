<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nguoi_dungs')->insert([
            'TenDaiDien' =>'Admin',
            'HovaTen' =>'Admin',
            'Email' =>'admin@gmai.com',
            'AnhNen' =>'',
            'SDT' =>'0123456789',
            'MatKhau' =>'admin',
            'IsAdmin' =>'1',
      ]);
    }
}
