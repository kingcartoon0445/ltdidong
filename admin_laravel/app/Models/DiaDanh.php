<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

use App\Models\AnhDiaDanh;
use App\Models\Mien;
use App\Models\TheLoai;
use App\Models\TienIch;
use App\Models\DanhGia;

class DiaDanh extends Model
{  use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    
    public function mien()
    {
        return $this->belongsTo(Mien::class, 'MaMien');
    }

    public function anhDiaDanhs(){
        return $this->hasMany(AnhDiaDanh::class, 'MaDiaDanh');
    }

    public function danhGias(){
        return $this->hasMany(DanhGia::class, 'MaDiaDanh');
    }

    public function thuocTheLoais(){
        return $this->hasMany(ThuocTheLoai::class, 'MaDiaDanh');
    }
}
