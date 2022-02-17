<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\NguoiDung;

class DeXuat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    
    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'MaNguoiDung');
    }

    public function diaDanh()
    {
        return $this->belongsTo(DiaDanh::class, 'MaDiaDanh');
    }
}
