<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TienIchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tien_iches')->insert([
            'Anh' =>'1.jpg',
            'Ten' =>'Nhà Hàng',
            'Loai' =>'1',
            'DiaChi' =>'Đây là địa chỉ',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'030231'
      ]);
      DB::table('tien_iches')->insert([
          'Anh' =>'2.jpg',
          'Ten' =>'Khách Sạn',
          'Loai' =>'2',
            'DiaChi' =>'Đây là địa chỉ',
            'MoTa' =>'Chưa có thông tin',
            'SDT' =>'010313'
    ]);
    DB::table('tien_iches')->insert([
      'Anh' =>'3.jpg',
      'Ten' =>'KO',
      'Loai' =>'3',
      'DiaChi' =>'Đây là địa chỉ',
      'MoTa' =>'Đang cập nhật',
      'SDT' =>'01213872' ]);
    }
}

