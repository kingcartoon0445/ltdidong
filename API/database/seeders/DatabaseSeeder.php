<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            MienSeeder::class,
            TheLoaiSeeder::class,
            DiaDanhSeeder::class,
            ThuocTheLoaiSeeder::class,
            TienIchSeeder::class,
            AnhDiaDanhSeeder::class,
            CoTienIchSeeder::class,
            NguoiDungSeeder::class,
            BaiVietSeeder::class,
            AnhBaiVietSeeder::class,
            DanhGiaSeeder::class,
            LikeSeeder::class,
            ViewSeeder::class,
            DeXuatSeeder::class
         ]);
    }
}
