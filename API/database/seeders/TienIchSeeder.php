<?php

namespace Database\Seeders;

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
        $Ti=new TienIch;
        $Ti-fill([
            'ten'=>"LIFE House Sadec",
            'loai'=>'1',
                'DiaChi'=>'76 Đường Nguyễn Tất Thành, Khóm Tân Thuận, Sa Đéc, Đồng Tháp, Việt Nam',
                'MoTa'=>'abc',
                'SDT'=>$i.'123456789',
        ]);
        $Ti->save();
    }
}
