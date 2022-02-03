<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\AnhDiaDanh;
use App\Models\Mien;
use App\Models\TheLoai;
use App\Models\TienIch;

class DiaDanh extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function mien()
    {
        return $this->belongsTo(Mien::class, 'MaMien');
    }

    public function anhDiaDanhs(){
        return $this->hasMany(AnhDiaDanh::class, 'MaDiaDanh');
    }

    public function theLoais(){
        return $this->belongsToMany(TheLoai::class, 'thuoc_the_loais', 'MaDiaDanh', 'MaTheLoai');
    }

    public function tienIchs(){
        return $this->belongsToMany(TienIch::class, 'co_tien_iches', 'MaDiaDanh', 'MaTienIch');
    }
}
