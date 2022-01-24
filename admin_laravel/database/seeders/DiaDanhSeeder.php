<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaDanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dia_danhs')->insert([
            'Ten' =>'Vịnh Hạ Long',
            'AnhBia'=>'1.png',
            'MaMien'=>'1',
            'KinhDo'=>'12345',
            'ViDo'=>'54321',
            'DiaChi'=>'Vịnh Hạ Long',
            'MoTa'=>'Vịnh Hạ Long là một vịnh nhỏ thuộc phần bờ tây vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo của thành phố Hạ Long thuộc tỉnh Quảng Ninh'
      ]);
      DB::table('dia_danhs')->insert([
          'Ten' =>'Huế',
          'AnhBia'=>'1.png',
          'MaMien'=>'2',
          'KinhDo'=>'12345',
          'ViDo'=>'231231',
          'DiaChi'=>'Huế',
          'MoTa'=>'Huế là thành phố tỉnh lỵ của tỉnh Thừa Thiên Huế, Việt Nam. Huế từng là kinh đô của Việt Nam thời phong kiến dưới triều Tây Sơn và triều Nguyễn. Hiện nay, thành phố là một trong những trung tâm về văn hóa  du lịch, y tế chuyên sâu, giáo dục đào tạo, khoa học công nghệ của Miền Trung Tây Nguyên và cả nước.'
    ]);
    DB::table('dia_danhs')->insert([
      'Ten' =>'Cà Mau',
      'AnhBia'=>'1.png',
      'MaMien'=>'3',
      'KinhDo'=>'132131',
      'ViDo'=>'12313121',
      'DiaChi'=>'Cà Mau',
      'MoTa'=>'Tỉnh Cà Mau mang đặc trưng của khí hậu nhiệt đới gió mùa cận xích đạo, với nền nhiệt độ cao vào loại trung bình trong tất cả các tỉnh Đồng bằng sông Cửu Long. Khí hậu Cà Mau được chia thành 2 mùa là mùa mưa và mùa khô.'
    ]);
    }
}

