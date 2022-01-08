<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiTaiKhoan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function nguoiDungs(){
        return $this->hasMany(NguoiDung::class);
    }
}
