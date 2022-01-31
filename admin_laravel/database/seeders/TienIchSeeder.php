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
        //1
        //Khách sạn
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'LIFE House Sadec',
            'Loai' =>'1',
            'DiaChi' =>'76 Đường Nguyễn Tất Thành, Khóm Tân Thuận, Sa Đéc, Đồng Tháp, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84857779880'
        ]);
        //2
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Khách sạn Victoria Núi Sam',
            'Loai' =>'1',
            'DiaChi' =>'Vinh Dong 1 Nui Sam Ward Chau Doc City, An Giang, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842963575888'
        ]);
        //3
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Harry 1 Hotel',
            'Loai' =>'1',
            'DiaChi' =>'Unnamed Road, An Thới, Phú Quốc, Kiên Giang 92513, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842973979139'
        ]);
        //4
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Hotel Hoàng Thuỳ ',
            'Loai' =>'1',
            'DiaChi' =>'Ấp Mũi, Đất Mũi, Ngọc Hiển, Cà Mau, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84982455689'
        ]);
        //5
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Long Life Riverside Hotel ',
            'Loai' =>'1',
            'DiaChi' =>'61 Nguyễn Phúc Chu, An Hội, Hội An, Quảng Nam, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842353911696'
        ]);
        //6
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Palm Garden Resort Hoi An',
            'Loai' =>'1',
            'DiaChi' =>'Lạc Long Quân, Hội An, Quảng Nam 560000, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842353927927'
        ]);
        //7
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Vinpearl Luxury Da Nang',
            'Loai' =>'1',
            'DiaChi' =>'No 7 Trường Sa, Street, Ngũ Hành Sơn, Đà Nẵng, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842363968888'
        ]);
        //8
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Blue Sea Motel',
            'Loai' =>'1',
            'DiaChi' =>'Bình Minh, Thăng Bình, Quảng Nam ',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842363967777'
        ]);
        //9
        DB::table('tien_iches')->insert([
            'Anh' =>'khachsan.jpg',
            'Ten' =>'Soleil Boutique',
            'Loai' =>'1',
            'DiaChi' =>'46 Lê Duẩn, Phú Hoà, Thành phố Huế, Thừa Thiên Huế, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84356147147'
        ]);
        //Nhà Hàng
        //10
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Nhà Hàng Hai Lúa Sa Đéc',
            'Loai' =>'1',
            'DiaChi' =>'150 Đường Nguyễn Tất Thành, Phường 1, Sa Đéc, Đồng Tháp, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84935369406'
        ]);
        //11
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Nhà Hàng Karaoke Mây Và Núi',
            'Loai' =>'1',
            'DiaChi' =>'Tân Lộ Kiều Lương, P. Núi Sam, Châu Đốc, An Giang, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84935369406'
        ]);
        //12
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Quán Ngon Biển Ngọc - Bien Ngoc Restaurant',
            'Loai' =>'1',
            'DiaChi' =>'Ấp 4, bãi đất đỏ khu phố 6, Kiên Giang 92531, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84988688982'
        ]);
        //13
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Nhà Hàng Công Đoàn',
            'Loai' =>'1',
            'DiaChi' =>'Đất Mũi, Ngọc Hiển, Cà Mau, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842903870202'
        ]);
        //14
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Inflame Club Restaurant',
            'Loai' =>'1',
            'DiaChi' =>'53, Nguyễn Phúc Chu (nối dài), Phường Minh An, Hội An, Quảng Nam, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842353929333'
        ]);
        //15
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Nhà hàng hải sản Hòa Hưng - Hội An',
            'Loai' =>'1',
            'DiaChi' =>'Lô 01 , biển, Quảng Nam, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84909602605'
        ]);
        //16
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'SC Restaurant & Bar',
            'Loai' =>'1',
            'DiaChi' =>'152 đường Huyền Trân Công Chúa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84777333369'
        ]);
        //17
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Moon River Restaurant',
            'Loai' =>'1',
            'DiaChi' =>'10 Nguyễn Du, Phường Minh An, Hội An, Quảng Nam, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'842353666678'
        ]);
        //18
        DB::table('tien_iches')->insert([
            'Anh' =>'nhahang.jpg',
            'Ten' =>'Bistro 34',
            'Loai' =>'1',
            'DiaChi' =>'34 Đinh Tiên Hoàng, Phú Hoà, Thành phố Huế, Thừa Thiên Huế, Việt Nam',
            'MoTa' =>'Chả có gì mô tả',
            'SDT' =>'84772486899'
        ]);
    }
}

