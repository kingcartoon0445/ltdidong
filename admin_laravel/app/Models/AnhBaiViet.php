<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\BaiViet;

class AnhBaiViet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function baiviet(){
        return $this->belongsTo(BaiViet::class);
    }
}
