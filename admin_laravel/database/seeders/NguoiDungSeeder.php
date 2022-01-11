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
            'TenDaiDien' =>'Thuận',
            'HovaTen' =>'Lê Thuận',
            'Email' =>'123@gmai.com',
            'AnhNen' =>'1.jpg',
            'MatKhau' =>'daylamatkhaucuaThuan',
            'SDT' =>'0123456789'
      ]);
      DB::table('nguoi_dungs')->insert([
          'TenDaiDien' =>'Dui',
          'HovaTen' =>'Dui sugarbaby',
          'Email' =>'1234@gmail.com',
            'AnhNen' =>'2.jpg',
            'MatKhau' =>'daylamatkhaucuaDui',
            'SDT' =>'0987654321'
    ]);
    DB::table('nguoi_dungs')->insert([
      'TenDaiDien' =>'Hoàng',
      'HovaTen' =>'Hoàng sugardaddy',
      'Email' =>'12345@gmai.com',
      'AnhNen' =>'3.jpg',
      'MatKhau' =>'daylamatkhaucuaHoang',
      'SDT' =>'012345678',
      'IsAdmin'=>'1' ]);
      DB::table('nguoi_dungs')->insert([
        'TenDaiDien' =>'Hoàng',
        'HovaTen' =>'Hoàng Huy',
        'Email' =>'123456@gmai.com',
        'AnhNen' =>'3.jpg',
        'MatKhau' =>'daylamatkhaucuaHoang',
        'SDT' =>'0333444555',
        ]);
    }
}
