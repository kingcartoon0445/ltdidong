<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bai_viets')->insert([
            'MaNguoiDung' =>'1',
            'MaDiaDanh' =>'2',
            'TieuDe' =>'Vẻ đẹp cố đô Huế',
            'NoiDung' =>'Cố đô nơi này với những thành quách, cung điện vàng son, những đền đài, miếu vũ lộng lẫy, những lăng tẩm uy nghiêm, những danh lam cổ tự u tịch'
           
      ]);
      DB::table('bai_viets')->insert([
          'MaNguoiDung' =>'2',
          'MaDiaDanh' =>'1',
          'TieuDe' =>'Vẻ đẹp Vịnh Hạ Long',
          'NoiDung' =>'Địa điểm du lịch vịnh Hạ Long nằm ở phía Đông Bắc Việt Nam, cách thủ đô Hà Hội khoảng 165km. Vịnh Hạ Long có đường bờ biển trải dài 50km'
           
    ]);
    DB::table('bai_viets')->insert([
      'MaNguoiDung' =>'3',
      'MaDiaDanh' =>'3',
      'TieuDe' =>'Cà Mau quê tôi',
      'NoiDung' =>'Cà Mau là tỉnh đồng bằng ven biển, nằm trong khu vực nội chí tuyến bắc bán cầu, cận xích đạo, đồng thời nằm trong khu vực gió mùa châu Á nên khí hậu Cà Mau ôn hoà thuộc vùng cận xích đạo, nhiệt đới gió mùa'
       ]);
    }
}
