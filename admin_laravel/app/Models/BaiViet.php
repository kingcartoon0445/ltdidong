<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use App\Models\NguoiDung;
use App\Models\DiaDanh;
use App\Models\AnhBaiViet;

class BaiViet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function nguoidung()
    {
        return $this->belongsTo(NguoiDung::class, 'MaNguoiDung');
    }

    public function diadanh()
    {
        return $this->belongsTo(DiaDanh::class, 'MaDiaDanh');
    }

    public function anhBaiViets(){
        return $this->hasMany(AnhBaiViet::class, 'MaBaiViet');
    }
}
