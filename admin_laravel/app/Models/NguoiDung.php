<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiDung extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function loaiTaiKhoan(){
        return $this->belongsTo(LoaiTaiKhoan::class);
    }
}
